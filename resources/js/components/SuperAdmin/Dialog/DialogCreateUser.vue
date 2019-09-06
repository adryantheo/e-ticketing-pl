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
                v-model="username"
                ></v-text-field>
                <v-text-field
                label="email"
                v-model="mail"
                ></v-text-field>
                <v-select
                v-model="role"
                ></v-select>
                <v-text-field
                label="password"
                v-model="password"
                ></v-text-field>
                <v-text-field
                label="konfirmasi password"
                v-model="c_password"
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
        username:null,
        mail: null,
        password: null,
        c_password: null,
        items: [
            
        ]
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
                    role: this.role
                };
                const res = await this.$user.signup(request)
                }catch(err){
                    console.log(Err)
                }
            }
        },
        fetchUserRole(){
            return axios.get('/api/role')
        },
        async getUserRole(){
            try{ 
                const res = await this.fetchUserRole()
                const role = res.data
                this.id = role.id
                this.text = role.role

                console.log(res.data)
            }catch(Err){
                console.log(Err)
            }
        }
    },
    mounted() {
        this.getUserRole()
    },
}
</script>