<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Inclusão de Associado
			</h1>
		</template>

		<div class="py-2">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<fieldset class="">
								<legend class="text-blue-900 mt-4">DADOS PESSOAIS</legend>
								<div>
									<input-number
										required
										title="Matrícula"
										v-model="form.code"
										:error="errors.code"
									/>
								</div>

								<div>
									<input-text
										required
										title="Nome"
										v-model="form.name"
										:error="errors.name"
									/>
								</div>

								<div>
									<input-text
										mask="###.###.###-##"
										title="CPF"
										v-model="form.cpf"
										required
										:error="errors.cpf"
									/>
								</div>

								<div>
									<label for="rg">RG</label>
									<input
										type="text"
										v-model="form.rg"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="birth">Data de Nascimento</label>
									<input
										
										type="date"
										v-model="form.birth"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="level_id">Status</label>
									<select
										required
										v-model="form.level_id"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									>
										<option value="1">Ativo</option>
										<option value="2">Aposentado</option>
									</select>
								</div>

								<div class="mt-4">
									<label for="comment">Observações</label>
									<textarea
										name="comment"
										type="text"
										v-model="form.comment"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									>
									</textarea>
								</div>
							</fieldset>

							<fieldset class="mt-2 mb-2">
								<legend class="text-blue-900 mt-4">ENDEREÇO</legend>
								<div>
									<label for="zipcode">CEP</label>
									<input
										@blur.prevent="searchAddress"
										type="number"
										v-model="form.zipcode"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="address">Endereço</label>
									<input
										
										type="text"
										v-model="form.address"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="number">Numero</label>
									<input
										ref="number"
										type="text"
										v-model="form.number"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="complement">Complemento</label>
									<input
										type="text"
										v-model="form.complement"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="district">Bairro</label>
									<input
										
										type="text"
										v-model="form.district"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="city">Cidade</label>
									<input
										
										type="text"
										v-model="form.city"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="state">Estado</label>
									<input
										
										type="text"
										v-model="form.state"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
							</fieldset>

							<fieldset class="mt-2 mb-2">
								<legend class="text-blue-900 mt-4">CONTATOS</legend>
								<div>
									<label for="ddd">DDD</label>
									<input
										
										type="number"
										v-model="form.ddd"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
								<div>
									<label for="phone">Telefone</label>
									<input
										type="number"
										v-model="form.phone"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
								<div>
									<label for="ddd">Email</label>
									<input
										
										type="email"
										v-model="form.email"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
							</fieldset>

							<!-- submit -->
							<div class="flex items-center mt-4">
								<button class="px-6 py-2 text-white bg-gray-900 rounded">
									Salvar
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";
import InputSelect from "@/Pages/Form/InputSelect.vue";

export default {
	components: {
		Head,
		Link,
		AppLayout,
		InputText,
		InputNumber,
		InputSelect,
	},
	props: {
		errors: Object,
	},
	setup() {
		const form = useForm({
			code: null,
			name: null,
			cpf: null,
			rg: null,
			birth: null,
			level_id: null,
			comment: null,
			zipcode: null,
			state: null,
			city: null,
			district: null,
			address: null,
			number: null,
			complement: null,
			ddd: null,
			phone: null,
			email: null,
		});

		return { form };
	},
	methods: {
		submit() {
			this.form.post(route("associates.store"));
		},
		searchAddress() {
			axios
				.get(route("address.search", { zipcode: this.form.zipcode }))
				.then((response) => {
					this.form.state = response.data.uf;
					this.form.city = response.data.localidade;
					this.form.district = response.data.bairro;
					this.form.address = response.data.logradouro;
					this.form.complement = response.data.complemento;
					this.form.ddd = response.data.ddd;
					this.$refs.number.focus();
				});
		},
	},
};
</script>
