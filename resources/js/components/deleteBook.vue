<template>
    <div>
        <v-card>
            <v-card-title>
                <h4>Delete book</h4>
            </v-card-title>
            <v-card-text>
                Are you sure you want to delete {{name}}?
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn @click="closeModal()" text>Close</v-btn>
                <v-btn color="primary" @click="del()">Delete</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
        }
    },
    props: ['id'],
    methods:{
        getBook(){
            axios.get('/books/'+this.id)
            .then(response => {
                this.name  = response.data.name;
            })
        },
        del(){
            axios.delete('/books/'+this.id)
				.then(response => {
				    this.closeModal()
			})
        },
        closeModal(){
            this.$emit('closeModal')
        },
    },
    created(){
        this.getBook();
    },
    watch: {
        id(val){
            this.getBook()
        }
    }
}
</script>