<template>
    <!-- Begin Modal Add -->
    <div class="ui modal" id="exporter_excel_modal">
        <i class="close icon"></i>
        <div class="header" style="background-color: #2196f3; color: white;">
            Exporter le rapport des véhicules
        </div>
        <!-- <form class="ui form segment"> -->
        <div class="content">
            <div class="ui red message" v-if="errors.length > 0" style="margin-left: 1%">
                <div class="ui list">
                    <div class="item" v-for="error in errors"><strong>{{ error }}</strong></div>
                </div>
            </div>
            <!-- <div class="ui error message"></div> -->
            <div class="ui form">
                <div class="required field">
                    <label style="text-transform: uppercase;">temps théorique par jour</label>
                    <input v-model="excel.temps_theorique" name="temps-theorique-par-jour" id="temps-theorique-par-jour" placeholder="00:00:00" type="text" required>
                </div>
                <div class="required field">
                    <label style="text-transform: uppercase;">du</label>
                    <input v-model="excel.start_date_excel"  name="start-date-export-excel" id="start-date-export-excel" placeholder="JJ/MM/AAAA" type="text" required>
                </div>
                <div class="required field">
                    <label style="text-transform: uppercase;">à</label>
                    <input v-model="excel.end_date_excel" name="end-date-export-excel" id="end-date-export-excel" placeholder="JJ/MM/AAAA" type="text" required>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui red cancel button">Annuler</div>
            <div @click="exporterExcel()" class="ui green button">Exporter</div>
        </div>
        <!-- </form> -->
    </div>
    <!-- END Modal Add -->
</template>

<script>
    export default {
        data(){
            return {
                excel: {
                    temps_theorique: '',
                    start_date_excel: '',
                    end_date_excel: ''
                },
                errors: []
            }
        },
        mounted() {
            //this.setDatePicker();
        },
        created(){
        },
        methods: {
            exporterExcel()
            {
                let export_temps_theorique = this.excel.temps_theorique;
                let export_start_date_excel = moment(this.excel.start_date_excel, "DD/MM/YYYY").format('YYYY-MM-DD');
                let export_end_date_excel =moment(this.excel.end_date_excel, "DD/MM/YYYY").format('YYYY-MM-DD');
                if(export_temps_theorique != '' && export_start_date_excel != '' && export_end_date_excel != '')
                {
                    $("#exporter_excel_modal").modal("hide");
                    window.open('export-excel/' + export_temps_theorique + '/' + export_start_date_excel + '/' + export_end_date_excel);
                    Event.$emit('sweet-alert-message-success', 'Le rapport est bien généré !');
                }

            }/*,
            setDatePicker() {
                Vue.nextTick(function () {
                    Event.$emit('init-date-picker');
                });
            }*/
        }
    }
</script>
