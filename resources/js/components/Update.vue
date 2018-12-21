<template>
      <!-- Modal Structure -->
    <div id="Update" class="modal" style="max-height: 100% !important;">
        <div class="modal-content">
            <div class="row">
                <div class="col s10">
                    <h5>{{list.name}}'s Details</h5>
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
                        <div class="col s2">
                             <span for="name">Name</span>
                         </div>
                        <div class="input-field col s10">
                            <input id="name" type="text" v-model="list.name" class="validate">
                            <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col s2">
                             <span for="email">Email</span>
                         </div>
                        <div class="input-field col s10">
                            <input id="email" type="email" v-model="list.email" class="validate">
                            <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
                        </div>
                    </div>
                    
                </form>
            </div>


        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-light btn-small" @click='update'>Save</button>
            <a href="#!" class="modal-close waves-effect waves-green btn btn-small">Close</a>
        </div>
    </div>
</template>


<script>
	export default{
		props:['openmodal'],
		data(){
			return{
				list:{},
                errors:{},
                ShowLoader: false
			}
		},
		methods:{
			close(){
				this.$emit('closeRequest')
			},
			update(){
            this.$data.ShowLoader = true ;
			axios.patch(`/contact/${this.list.id}`,this.$data.list).then((response)=> $('#Update').modal('close'))
                  .catch((error) => this.errors = error.response.data.errors)
                this.$data.ShowLoader = false ;
                
			}
		}
	}
</script>