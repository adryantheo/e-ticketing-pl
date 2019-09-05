<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>
                User Baru
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon @click="$emit('close')">
                <v-icon >fa fa-times</v-icon>
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
        </v-card-text>
    </v-card>
</template>
<script>
import { async } from 'q';
export default {
    data: () => ({
        username:null,
        mail: null,
        password: null,
        cpassword: null,
        role: []
    }),
    methods: {
        async registerUser(){
            if(this.$refs.form_register_user.validate()){
                try{
                
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
                const role = res.data.reverse()
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