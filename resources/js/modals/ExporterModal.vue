<template>
        <!-- Begin Modal Form -->
        <parts-modal-normal-form id="exporter_excel_modal">
            <div slot="header_modal">Exporter le rapport des véhicules</div>
            <div slot="content_modal">
                <!--<parts-messages v-if="errors.length > 0" classValue="ui red message" styleMessage="margin-left: 1%">
                    <span slot="item_message">
                        <parts-lists classValue="ui list">
                            <span slot="item"><div class="item" v-for="error in errors"><strong>{{ error }}</strong></div></span>
                        </parts-lists>
                    </span>
                </parts-messages>-->
                <div class="ui red message" v-if="errors.length > 0" style="margin-left: 1%">
                    <div class="ui list">
                        <div class="item" v-for="(error, index) in errors" :key="index"><strong>{{ error }}</strong></div>
                    </div>
                </div>
                <!--<parts-form-input-text v-on:keyup.enter.native="exporterExcel()" v-model="excel.temps_theorique" name="temps-theorique-par-jour" placeholder="00:00:00" labelName="temps théorique par jour" type="text" idInput="id-temps-theorique-par-jour"></parts-form-input-text>-->
                <!--<parts-form-input-text v-on:keyup.enter.native="exporterExcel()" v-model="excel.start_date_excel" name="start-date-export-excel" placeholder="JJ/MM/AAAA" labelName="du" type="text" idInput="id-start-date-export-excel"></parts-form-input-text>-->
                <!--<parts-form-date-picker v-on:keyup.enter.native="exporterExcel()" value="excel.start_date_excel" name="start-date-export-excel" placeholder="JJ/MM/AAAA" labelName="du" idInput="id-start-date-export-excel" format="dd/MM/yyyy"></parts-form-date-picker>-->
                <!--<parts-form-input-text-mask v-on:keyup.enter.native="exporterExcel()" v-model="excel.temps_theorique" name="temps-theorique-par-jour" placeholder="00:00:00" labelName="temps théorique par jour" type="text" idInput="id-temps-theorique-par-jour"></parts-form-input-text-mask>-->
                <div class="required field">
                    <label style="text-transform: uppercase;">temps théorique par jour</label>
                    <input v-on:keyup.enter.native="exporterExcel()" v-model="excel.temps_theorique" id="id-temps-theorique-par-jour" type="text" name="temps-theorique-par-jour" placeholder="placeholder" v-mask="mask">
                </div>
                <div class="required field">
                    <label style="text-transform: uppercase;">du</label>
                    <datepicker language="fr" v-model="excel.start_date_excel" name="start-date-export-excel" id="id-start-date-export-excel" placeholder="JJ/MM/AAAA" format="dd/MM/yyyy" required></datepicker>
                </div>
                <!--<parts-form-input-text v-on:keyup.enter.native="exporterExcel()" v-model="excel.end_date_excel" name="end-date-export-excel" placeholder="JJ/MM/AAAA" labelName="du" type="text" idInput="id-end-date-export-excel"></parts-form-input-text>-->
                <div class="required field">
                    <label style="text-transform: uppercase;">à</label>
                    <datepicker language="fr" v-model="excel.end_date_excel" name="end-date-export-excel" id="id-end-date-export-excel" placeholder="JJ/MM/AAAA" format="dd/MM/yyyy" required></datepicker>
                </div>
            </div>
            <div slot="action_modal">
                <parts-form-button classValue="ui red cancel button" labelName="Annuler"></parts-form-button>
                <parts-form-button v-on:click.native="exporterExcel()" classValue="ui green submit button" labelName="Ajouter"></parts-form-button>
            </div>
        </parts-modal-normal-form>
        <!-- End Modal Form -->
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import DateLanguages from '../utils/DateLanguages';
    
    export default {
        components: {
            Datepicker
        },
        data(){
            return {
                excel: {
                    temps_theorique: '',
                    start_date_excel: '',
                    end_date_excel: ''
                },
                mask: '##:##:##',
                errors: []
            }
        },
        mounted() {
        },
        created(){
        },
        methods: {
            exporterExcel()
            {
                if(this.excel.start_date_excel != "" && this.excel.end_date_excel != "" && this.excel.temps_theorique != "")
                {
                    let export_temps_theorique = this.excel.temps_theorique;
                    let export_start_date_excel = moment(this.excel.start_date_excel).format('YYYY-MM-DD');
                    let export_end_date_excel =moment(this.excel.end_date_excel).format('YYYY-MM-DD');
                    if(export_temps_theorique != '' && export_start_date_excel != '' && export_end_date_excel != '')
                    {
                        this.errors = [];
                        $("#exporter_excel_modal").modal("hide");
                        window.open('export-excel/' + export_temps_theorique + '/' + export_start_date_excel + '/' + export_end_date_excel);
                        Event.$emit('sweet-alert-message-success', 'Le rapport est bien généré !');
                    }
                }
                else
                {
                    this.errors = [];
                    this.errors.push("Veuillez remplir tous les champs SVP !");
                }

            }
        }
    }
</script>
