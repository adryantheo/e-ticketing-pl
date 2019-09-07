<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>
                User Baru
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon @click="$emit('close')">
                <v-icon color="error">fa fa-times</v-icon>
            </v-btn>
        </v-toolbar>
        <v-card-text>
            <v-form ref="form_register_user" @submit.prevent="registerUser">
                <v-text-field
                label="username"
                v-model="name"
                :rules="[rules.required]"
                ></v-text-field>
                <v-text-field
                label="email"
                v-model="email"
                :rules="[rules.required]"
                ></v-text-field>
                <v-select
                v-model="role"
                :items="akses"
                item-text="role_name"
                item-value="id"
                label="hak akses"
                :rules="[rules.required]"
                >
                </v-select>
                <v-text-field
                label="password"
                v-model="password"
                type="password"
                :rules="[rules.required]"
                ></v-text-field>
                <v-text-field
                label="konfirmasi password"
                type="password"
                v-model="c_password"
                :rules="[rules.required]"
                ></v-text-field>
                <v-btn type="submit">
                    register
                </v-btn>
            </v-form>
        </v-card-text>
    </v-card>
</template>
<script>
export default {
    data: () => ({
        name:null,
        email: null,
        password: null,
        c_password: null,
        role:null,
        rules: {
            required: v => !!v || 'Harus diisi',
        },
        akses: []
    }),
    methods: {
        async registerUser(){
            if(this.$refs.form_register_user.validate()){
                try{
                const request = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    c_password: this.c_password,
                    role_id: this.role
                };
                const res = await this.$user.signup(request)
                }catch(err){
                    console.log(err)
                }
            }
        },
        fetchRole(){
            return axios.get('/api/role')
            .then(response => this.akses = response.data)
        },
        // getRole(){

        // }
    },
    mounted() {
        this.fetchRole()
    },
}
</script>