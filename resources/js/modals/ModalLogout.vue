<template>
    <!-- Begin Modal Logout -->
        <parts-modal-logout id="logout-modal">
            <div slot="header_modal">Voulez-vous vraiment quitter l'application ?</div>
            <div slot="action_modal">
                <parts-form-button classValue="ui red cancel inverted button" labelName="Non"></parts-form-button>
                <parts-form-button v-on:click.native="logout()" classValue="ui green ok inverted button" labelName="Oui"></parts-form-button>
            </div>
        </parts-modal-logout>
        <!-- End Modal Logout -->
</template>

<script>
    export default {
        mounted() {

        },
        methods:{
            logout(){
                Event.$emit('logout-app');
            }
        }
    }
</script>
