<template>
    <v-card>
        <v-toolbar>
            <v-toolbar-title>Hak Akses Baru</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat icon @click="$emit('close')">
                <v-icon>
                    fa fa-times
                </v-icon>
            </v-btn>
        </v-toolbar>
        <v-card-text>
            <v-form ref="form_new_role" @submit.prevent="addRole">
                <v-text-field
                label="Nama Hak Akses"
                v-model="role_name"
                ></v-text-field>
                <v-btn type="submit">
                    Buat Hak Akses
                </v-btn>
            </v-form>
        </v-card-text>
    </v-card>
</template>
<script>
export default {
    data: () => ({
        role_name: null
    }),
    methods: {
        async addRole(){
            if(this.$refs.form_new_role.validate()){
                this.loading = true
                try{
                    const res = await axios.post('/api/role',{
                        role_name : this.role_name
                    })
                }catch(err){
                    console.log(err)
                }
            }
        }
    },
}
</script>