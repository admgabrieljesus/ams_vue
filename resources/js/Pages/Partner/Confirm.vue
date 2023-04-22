<template>
	<AppGuest>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Confirmação de Solicitação de Cadastro de Conveniado
			</h1>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<h2>Solicitação de Cadastro Realizada com Sucesso!</h2>
				</div>
				<div>
					<Link :href="route('partners.menu')" class="text-sm text-gray-700">
						<p>Clique aqui para realizar o cadastro de outro conveniado.</p>
					</Link>
				</div>
			</div>
		</div>
	</AppGuest>
</template>

<script>
import { defineComponent } from "vue";
import AppGuest from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
	components: {
		AppGuest,
		Head,
		Link,
	},
	props: {
		type: String,
	},
});
</script>
