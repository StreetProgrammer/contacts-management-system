<template>
	<div>
		
		<nav class="panel column is-offset-2 is-8" >
			<p class="panel-heading" style="margin: 15px 15px;font-size: 18px;font-weight: bold;">
				contacts control panel 
				<button class="btn-small" style="margin: 15px 15px; float: right;" @click="openAdd">
					Add New
				</button>
				<span class="is-pulled-right" v-if="loading">
					<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
				</span>
			</p>
			<div class="panel-block">
				<p class="control has-icons-left">
					<input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
					<span class="icon is-small is-left">
						<i class="fa fa-search"></i>
					</span>
				</p>
			</div>
		
		</nav>

		<ul class="collection with-header">
			<li class="collection-header">
				<!--<h4>First Names</h4>-->
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<input id="search" v-model="searchQuery" type="text" class="validate">
							<label for="search">Search</label>
						</div>
					</div>
				</div>
			</li>

			<li class="collection-item" style="height: 55px;" v-for="item,key in temp">
				<div>
					{{ item.name }}
					<a href="#!" class="secondary-content waves-effect waves-light btn-small" @click="openShow(key)" style="margin: 0px 10px;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<a href="#!" class="secondary-content waves-effect waves-light btn-small" @click="openUpdate(key)" style="margin: 0px 10px;">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
					<a href="#!" class="secondary-content waves-effect waves-light btn-small" @click="del(key,item.id)" style="margin: 0px 10px;">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
				</div>
			</li>
			
		</ul>

		<Add></Add>
		<Show></Show>
		<Update></Update>
	</div>
</template>

<script>
let Add = require('./Add.vue');
let Show = require('./Show.vue');
let Update = require('./Update.vue');
	export default{
		components:{Add,Show,Update},
		data(){
			return{
				lists:{},
				errors:{},
				loading:false,
				searchQuery:'',
				temp:''
			}
		},
		watch:{
			searchQuery(){
				if (this.searchQuery.length > 0) {
					this.temp = this.lists.filter((item) => {
						return Object.keys(item).some((key)=>{
							let string = String(item[key]) 
							return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
							// console.log(string)
						})
					});
					// console.log(result)
				}else{
					this.temp = this.lists
				}
			}
		},
		mounted(){
			$('.modal').modal();
			axios.post('/getData')
			.then((response)=> this.lists = this.temp = response.data)
			.catch((error) => this.errors = error.response.data.errors)
		},
		methods:{
			openAdd(){
				$('#Add').modal('open');
			},
			openShow(key){
				console.log(this.temp[key])
				this.$children[1].list = this.temp[key]
				$('#Show').modal('open');
			},
			openUpdate(key){
				this.$children[2].list = this.temp[key]
				$('#Update').modal('open');
			},
			close(){
				this.addActive = this.showActive = this.updateActive = ''
			},
			del(key,id){
				if (confirm("Are you sure ?")) {
					this.loading = !this.loading
					axios.delete(`/contact/${id}`)
					.then((response)=> {this.lists.splice(key,1);this.loading = !this.loading})
					.catch((error) => this.errors = error.response.data.errors)	
				}
				console.log(`${key} ${id}`)
			}
		}
	}
</script>