<template>
      <!-- Modal Structure -->
    <div id="Add" class="modal" style="max-height: 100%;">
        <div class="modal-content">
            <div class="row">
                <div class="col s10">
                    <h5>Add New Contact</h5>
                </div>
                <div class="col s1" v-if="ShowLoader == true">
                    <div class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                        <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                        <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                        <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                        <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="col s12">

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" v-model="list.name" class="validate">
                            <label for="name">Name</label>
                            <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" v-model="list.email" class="validate">
                            <label for="email">Email</label>
                            <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
                        </div>
                    </div>
                    
                </form>
            </div>


        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-light btn-small" @click='save'>Save</button>
            <a href="#!" class="modal-close waves-effect waves-green btn btn-small">Close</a>
        </div>
    </div>
</template>

<script>
	export default{
        props:['openmodal'],
        
		data(){
			return{
				list:{
					name:'',
					email:''
				},
                errors:{},
                ShowLoader: false
			}
        },
        mounted(){
			$('.modal').modal();
		},
		methods:{
			save(){
                this.$data.ShowLoader = true ;
				axios.post('/contact',this.$data.list).then((response)=> {
                    
					this.$parent.lists.push(response.data)
					this.$parent.lists.sort(function(a,b){
						if (a.name > b.name) {
							return 1;
						}else if(a.name < b.name){
							return -1;
						}
					})
                    this.list = ""
                    $('#Add').modal('close');
				})
                  .catch((error) => this.errors = error.response.data.errors)
                this.$data.ShowLoader = false ;
			}
		}
	}
</script>
