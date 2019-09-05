<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>Registrasi User</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon>
                <v-icon>fa fa-times</v-icon>
            </v-btn>
        </v-toolbar>
        <v-form ref="form_new_register" @submit.prevent="registerUser">
            <v-text-field
            label="Username"
            v-model="name"
            ></v-text-field>
            <v-text-field
            label="email"
            v-model="email"
            
            ></v-text-field>
        </v-form>
    </v-card>
</template>
<script>
export default {
    data: () => ({
        // 
    })
}
</script>