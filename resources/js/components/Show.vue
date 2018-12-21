<template>
      <!-- Modal Structure -->
    <div id="Show" class="modal" style="max-height: 100%;">
        <div class="modal-content">
            <div class="row">
                <div class="col s10">
                    <h5>Name</h5>
                </div>
            </div>
            <div class="row">
                <form class="col s12">

                    <div class="row">
                        <div class="input-field col s12">
                            <h4>Name</h4>
                            <p>{{ list.name }}</p>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-field col s12">
                            <h4>Name</h4>
                            <p>{{ list.email }}</p>
                        </div>
                    </div>
                    
                </form>
            </div>


        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn btn-small">Close</a>
        </div>
    </div>
</template>

<script>
	export default{
		data(){
			return {
				list:''
			}
		},
		methods:{
			
		}
	}
</script>