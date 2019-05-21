<script>
	import { onMount } from "svelte";

	onMount(() => {
	  console.log("the component has mounted");
	});
</script>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Example Component</div>
					<div class="card-body">
						I'm an example component.
					</div>
				</div>
			</div>
		</div>
	</div>
</main>