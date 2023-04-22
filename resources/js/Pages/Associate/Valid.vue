<template>
	<AppGuest>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Validação de Dados de Associado
			</h1>
		</template>

		<div v-if="message != null">
			<p class="bg-cyan-500 m-4 p-4" v-if="message == 'success'">
				<span>Associado Validado com Sucesso</span>
			</p>
			<p class="bg-red-400 m-4 p-4" v-else>
				{{ message }}
			</p>
		</div>

		<div class="py-6">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="px-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<form @submit.prevent="submit">
						<input type="hidden" v-model="form.type" readonly />

						<fieldset>
							<legend>IDENTIFICAÇÃO</legend>

							<p class="mb-2">
								Preencha corretamente os dados do formulário para receber acesso
								ao sistema AMS/AEPET-BA.
							</p>

							<div class="mt-2">
								<input-text title="NOME" v-model="form.name" required />
							</div>

							<div class="mt-2">
								<input-text
									mask="###.###.###-##"
									title="CPF"
									v-model="form.cpf"
									required
								/>
							</div>

							<div class="mt-2">
								<label>EMAIL</label>
								<input
									required
									type="email"
									v-model="form.email"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>
						</fieldset>

						<button
							type="submit"
							class="mt-5 mb-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						>
							Enviar Solicitação
						</button>
					</form>
				</div>
			</div>
		</div>
	</AppGuest>
</template>

<script>
import { defineComponent } from "vue";
import AppGuest from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";

export default defineComponent({
	components: {
		AppGuest,
		Head,
		Link,
		InputText,
		InputNumber,
	},
	props: {
		type: String,
	},
	setup(props) {
		let message = null;
		const form = useForm({
			name: null,
			cpf: null,
			email: null,
		});
		return { form, message };
	},
	methods: {
		submit() {
			//this.form.post(route("associates.confirm"));
			axios
				.post(
					route("associates.confirm", {
						name: this.form.name,
						cpf: this.form.cpf,
						email: this.form.email,
					})
				)
				.then((response) => {
					this.message = response.data;
					this.form.name = null;
					this.form.cpf = null;
					this.form.email = null;
					//this.$refs.number.focus();
				});
		},
	},
});
</script>
