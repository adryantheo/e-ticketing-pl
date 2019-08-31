<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>
                Registrasi User 
            </v-toolbar-title>
        </v-toolbar>
        <v-form ref="form_register_user" @submit.prevent="registerUser">
            <v-text-field
            label="username"
            v-model="username"
            ></v-text-field>
            <v-text-field
            label="email"
            v-model="mail"
            ></v-text-field>
            <v-select></v-select>
            <v-text-field
            label="password"
            v-model="password"
            ></v-text-field>
            <v-text-field
            label="konfirmasi password"
            v-model="cpassword"
            ></v-text-field>
        </v-form>
    </v-card>
</template>
<script>
import { async } from 'q';
export default {
    data: () => ({
        username=null,
        mail= null,
        password: null,
        cpassword= null
    }),
    methods: {
        async registerUser(){
            if(this.$refs.form_register_user.validate()){
                try{
                    const res = axios.post('/api/register')
                    // 
                }catch(err){

                    console.log(Err)
                }
            }
        },
        fetchUserRole(){
            return axios.get('/api/role')
        },
        getUserRole(){
            try{ 
                const res = await this.fetchUserRole()
                const role = res.data.reverse()
            }catch(Err){
                console.log(Err)
            }
        }
    },
}
</script>