<template>
    <v-container>
        <v-layout v-if="loading">
            <v-flex>
                <v-progress-circular
                :width="7"
                :height="70"
                indeterminate
                ></v-progress-circular>
            </v-flex>
        </v-layout>
        <template v-else>
            <v-layout>
                <v-flex>
                    <h1>{{name}}</h1>
                </v-flex>
                <v-flex v-for="(item, i) in productTicket" :key="`am-${i}`">
                    <h1> {{item.name}} </h1>
                    <!-- <qr-code :text="item.qr_codes"></qr-code> -->
                </v-flex>
            </v-layout>
        </template>
    </v-container>
</template>
<script>
export default {
    data: () => ({
        loading:false,
        productTicket: [],
        name: ""
    }),
    methods: {
        fetchAllTicket(){
            return axios.get("/api/ticket/superadmon@mail.com")
        },
        async getTicket(){
            this.loading = true
            try{
                const res = await this.fetchAllTicket();
                const ticket = res.data;
                this.productTicket = ticket.qr_codes.reverse()
                console.log(ticket)
            }catch(err){
                console.log(err)
            }
            this.loading = false
        }
    },
    mounted() {
        this.getTicket()
    },
}
</script>