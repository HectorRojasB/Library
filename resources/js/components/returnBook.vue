<template>
    <div>
        <v-card>
            <v-card-title>
                <h4>Return book</h4>
            </v-card-title>
            <v-card-text>
                Did {{user}} return the book: {{name}} ?
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn @click="closeModal()" text>Close</v-btn>
                <v-btn color="primary" @click="ret()">Confirm</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            user:''
        }
    },
    methods:{
        getBook(){
            axios.get('/books/'+this.id)
            .then(response => {
                this.name  = response.data.name;
                this.user = response.data.user;
            })
        },
        ret(){
            axios.post('/returnBook', {
                    id: this.id,
                    user: 'none'
                })
                .then((response) => {
                    this.closeModal()
            })
        },
        closeModal(){
            this.$emit('closeModal')
        },
    },
    props:['id'],
    created(){
        this.getBook()
    }
}
</script>
