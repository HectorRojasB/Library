<template>
    <div>
        <v-card>
            <v-card-title>
                <h4>Lend book</h4>
            </v-card-title>
            <v-card-text>
                Lend {{name}} to:
                <v-form ref="form" v-model="valid">
                    <v-row no-gutters>
                        <v-col>
                            <v-text-field v-model="user" label="User" :rules="rules.user"></v-text-field>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn @click="closeModal()" text>Close</v-btn>
                <v-btn color="primary" @click="lend()">Confirm</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>

export default {
    data(){
        return{
            name:'',
            valid: false,
            rules: {
                user: [
                    v => !!v || 'User is required'
                ]
            }
        }
    },
    props:['id'],
    methods:{
        getBook(){
            axios.get('/books/'+this.id)
            .then(response => {
                this.name  = response.data.name;
            })
        },
        lend(){
           axios.post('/lendBook', {
                    user: this.user,
                    id: this.id,
                })
                .then((response) => {
                    this.closeModal()
            })
        },
        closeModal(){
            this.$emit('closeModal')
        },
    },
    created(){
        this.getBook();
        this.user = ''
    },
    watch: {
        id(val){
            this.getBook()
        }
    }
}
</script>