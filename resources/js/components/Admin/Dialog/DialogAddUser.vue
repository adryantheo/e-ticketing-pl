<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>Registrasi User</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon>
                <v-icon color="error">fa fa-times</v-icon>
            </v-btn>
        </v-toolbar>
        <v-form ref="form_register_user" @submit.prevent="registerUser">
            <v-card-text>
                <v-text-field
                label="Username"
                v-model="name"
                :rules="[rules.required]"
                ></v-text-field>
                <v-text-field
                label="email"
                v-model="email"
                :rules="[rules.required, rules.email]"
                ></v-text-field>
                <v-text-field
                label="Password"
                v-model="password"
                :rules="[rules.required, rules.password]"
                ></v-text-field>
                <v-text-field
                label="Konfirmasi password"
                v-model="c_password"
                :rule="[rules.required, rules.password]"
                ></v-text-field>
                </v-card-text>
                <v-btn type="submit">
                    register
                </v-btn>
        </v-form>
    </v-card>
</template>
<script>
export default {
    data: () => ({
        loading:false,
        role: 3,
        name: [],
        password: [],
        rules: {
            required: v => !!v || 'Harus diisi',
            email: v => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'Format E-Mail salah',
            password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'Password harus terdiri dari alphabert, angka, huruf kapital, dan karakter spesial',
        }
    }),
    methods: {
        async registerUser(){
            if(this.$refs.form_register_user.validate()){
                this.loading = true
                try {
                    const request = {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        c_password: this.c_password,
                        role: this.role
                    };
                    const res = await $user.signup(request)
                }catch(err){
                    console.log(err)
                }this.loading = false
            }
        },
    },
}
</script>