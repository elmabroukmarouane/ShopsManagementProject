<template>
    <!-- Begin Modal Logout -->
    <div class="ui basic modal" id="logout-modal">
        <div class="ui icon header">
            <i class="power off icon"></i>
            <br>
            Voulez-vous vraiment quitter l'application ?
        </div>
        <div class="actions">
            <div class="ui red cancel inverted button">
                <i class="remove icon"></i>
                No
            </div>
            <div @click="logout()" class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Yes
            </div>
        </div>
    </div>
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
