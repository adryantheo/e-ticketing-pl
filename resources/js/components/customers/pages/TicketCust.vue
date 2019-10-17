<template>
    <v-container grid-list-lg fill-height>
        <v-layout v-if="loading">
            <v-flex class="text-xs-center">
                <v-progress-circular
                :size="70"
                :width="7"
                color="primary"
                indeterminate
                ></v-progress-circular>
            </v-flex>
        </v-layout>
        <template v-for="(item, i) in productTicket">
            <v-layout :key="`am-${i}`">
                <v-flex>
                    <p>ticket</p>
                    <!-- <v-card class="rounded1" elevation="5">
                        <h1>hhhhhhhh</h1>
                    </v-card> -->
                </v-flex>
                <v-flex>
                    <p>qr</p>
                    <v-container grid-list-md>
                        <v-layout row wrap justify-center align-center>
                        <v-flex  xs12 md9 >
                            <v-card class="rounded" elevation="10">
                                <v-card-text class="text-xs-center font-weight-bold"> 
                                    Anda Belum Memiliki Tiket <br> Silahkan Membeli Tiket dengan Menekan Tombol dibawah
                                    <v-spacer></v-spacer>
                                    <v-btn outline round color="info">
                                        Pesan TIket
                                    </v-btn>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                    </v-container>
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
    }),
    methods: {
        fetchAllTicket(){
            const email = localStorage.getItem('Email')
            return axios.get(`/api/ticket/${email}`)
        },
        async getTicket(){
            this.loading = true
            try{
                const res = await this.fetchAllTicket()
                this.productTicket = res.data
                console.log(this.productTicket)
            }catch(err){
                console.log(err)
            }
            this.loading = false
        },
    },
    mounted() {
        this.getTicket()
    },
}
</script>