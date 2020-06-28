<template>
	<div>
		<v-app>
			<v-main>
				<v-container>
					<v-card>
						<v-card-title>
							<h4>The Library</h4>
						</v-card-title>
                        <v-card-text>
                            <v-row>
                                <v-col>
                                    <v-text-field label="Search" v-model="search"></v-text-field>
                                </v-col>
                                <v-col class="text-right">
                                    <v-btn color="primary" class="white--text" @click="modal = !modal">New Book</v-btn>
                                </v-col>
                            </v-row>
                        </v-card-text>
						<v-card-text>
							<v-data-table :headers="headers" :items="books" :search="search" class="elevation-1">
                                <template v-slot:item.actions="{ item }">
                                    <v-row>
                                        <div v-for="(action, i) in item.actions" :key="i">
                                            <v-btn text small dense @click="methodHandler(action.method, item.id)">{{ action.action }}</v-btn>
                                        </div>
                                    </v-row>
                                </template>
                            </v-data-table>
						</v-card-text>
					</v-card>
                    <v-dialog v-model="modal" max-width="50%">
			            <new-book @closeModal="modal = false; read()"></new-book>
                    </v-dialog>

                    <v-dialog v-model="modalEdit" max-width="50%">
			            <edit-book :id="idToEdit" @closeModal="modalEdit = false; read()"></edit-book>
                    </v-dialog>

					<v-dialog v-model="modalDelete" max-width="50%">
						<delete-book :id="idToDelete" @closeModal="modalDelete = false; read()"></delete-book>
                    </v-dialog>

					<v-dialog v-model="modalLend" max-width="50%">
						<lend-book :id="idToLend" @closeModal="modalLend = false; read()"></lend-book>
                    </v-dialog>

					<v-dialog v-model="modalReturn" max-width="50%">
						<return-book :id="idToReturn" @closeModal="modalReturn = false; read()"></return-book>
                    </v-dialog>

				</v-container>
			</v-main>
		</v-app>
	</div>

</template>


<script>
	import Vuetify from "vuetify";
	import 'vuetify/dist/vuetify.css';
	Vue.use(Vuetify);
	
	
	export default {
		vuetify: new Vuetify(),
		components: {
			// modal,
		},
		data() {
			return {
                modal: false,
				modalEdit: false,
				modalDelete: false,
				modalLend: false,
				modalReturn: false,
				books: [],
				idToDelete: '',
				idToEdit: '',
				idToLend: '',
				idToReturn: '',
                search: '',
                headers: [
                    { text: 'Book', value: 'name' },
                    { text: 'Author', value: 'author' },
                    { text: 'Published', value: 'published_date' },
                    { text: 'Category', value: 'category.name' },
                    {
                        text: 'Actions',
                        align: 'start',
                        sortable: false,
                        value: 'actions',
                    },
                ],
			}
		},
		methods: {
			read() {     
				axios.get('/books')
                .then(response => {
                    
                    this.books = response.data.map(element => {
                        element['actions'] = [
                            { action: 'Edit', method: 'editBook' },
                            { action: 'Delete', method: 'deleteBook' },
                        ]
                        if(element.user == 'none'){
                            element['actions'].push({ action: 'Lend', method: 'lendBook' })
                        }else{
                            element['actions'].push({ action: 'Return', method: 'returnBook' })
                        }
                        return element;
                    });
                     ;
				})
			},
			showModal(modal){
				this.$bvModal.show(modal);
            },
            methodHandler(method, id){
                this[method](id)
            },
            editBook(id){
                this.idToEdit = id
                this.modalEdit = true
            },
            deleteBook(id){
				this.idToDelete = id
                this.modalDelete = true
            },
            lendBook(id){
                this.idToLend = id
                this.modalLend = true
            },
            returnBook(id){
                this.idToReturn = id
                this.modalReturn = true
            },
			hideModal($modal) {
				this.$refs[$modal].hide()
			},
		},
		created(){
			this.read();
		}
	}
</script>

<style>
	body{
		background: #fff;
	}
	h1{
		margin-top:2%;
		font-size: 50px;
		font-weight: bold;
		text-align: center;
	}
	
</style>