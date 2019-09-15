<template>
    <div>
        <v-content>
            <v-container>
                <v-layout align-center>
                    <v-flex md>
                        <v-card max-width="500px">
                            <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>            
        </v-content>
    </div>   
</template>
<script>
export default {
    data:() =>({
        result : '',
        error: '',
        loading: false,
    }),
    methods:{
        async onDecode(qrcode){
            try{
            this.loading=true;
            this.result = qrcode
            console.log(this.result);
            await axios.patch(`/api/ticket/${this.result}/checkin`);
            alert("Berhasil Check-In");
            this.loading=false
            }catch(errorRedeem){
                console.log(errorRedeem);
                alert("Gagal Check-In");
                this.loading=false;
            }          
        },
    async onInit (promise){
            try{
                await promise
            }catch(error){
                if (error.name === 'NotAllowedError') {
                    alert("ERROR: you need to grant camera access permisson"); 
                } else if (error.name === 'NotFoundError') {
                    alert("ERROR: no camera on this device");
                } else if (error.name === 'NotSupportedError') {
                    alert(this.error = "ERROR: secure context required (HTTPS, localhost)");
                } else if (error.name === 'NotReadableError') {
                    alert("ERROR: is the camera already in use?");
                } else if (error.name === 'OverconstrainedError') {
                    alert("ERROR: installed cameras are not suitable");
                } else if (error.name === 'StreamApiNotSupportedError') {
                    alert("ERROR: Stream API is not supported in this browser");
                }
            }
        },

    },
    
}
</script>