<template>
<v-app>
    <v-content>
        <v-container grid-list-lg fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 md9 style="max-width: 600px">
                <v-card>
                    <v-toolbar>
                        <v-toolbar-title>Register</v-toolbar-title>
                    </v-toolbar>
                    <v-card-text>
                        <v-form ref="register_user" @submit.prevent="registerUser">
                            <v-text-field
                            label="Nama"
                            v-model="name"
                            ></v-text-field>
                            <v-text-field
                            label="E-Mail"
                            v-model="email"
                            :rules="[rules.required, ]"
                            ></v-text-field>
                            <v-text-field
                            label="Password"
                            v-model="password"
                            type="password"
                            :rules="[rules.required, rules.password]"
                            ></v-text-field>
                            <v-text-field
                            label="Konfirmasi Password"
                            v-model="c_password"
                            type="password"
                            :rules="[rules.required, rules.password]"
                            ></v-text-field>
                        </v-form>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn type="submit">
                            Registrasi
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
    </v-content>
</v-app>
</template>
<script>
export default {
    data: () => ({
        email: null,
        name: null,
        password:null,
        c_password: null,
        loading:false,
        rules:{
            required: v => !!v || 'Harus diisi',
            password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'Password harus terdiri dari alphabert, angka, huruf kapital, dan karakter spesial',
        }
    }),
    methods: {
        async registerUser(){
            if(this.$refs.register_user.validate()){
                this.loading = true
                try{
                    const request = {
                        email: this.email,
                        name: this.name,
                        password: this.password,
                        c_password: this.c_password
                    }
                    const res = await this.$user.signup(request)
                }catch(err){
                    console.log(err)
                }
            }
        }
    },
}
</script>