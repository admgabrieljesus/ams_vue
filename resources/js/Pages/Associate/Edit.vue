<template>
	<PopupLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Alteração de Associado
			</h1>
		</template>

		<div class="py-2">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<div class="p-2 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<fieldset>
								<legend class="text-blue-900">DADOS PESSOAIS</legend>

								<div class="mb-2">
									<label for="active">Associado?</label>
									<div class="flex items-center">
										<input
											name="active"
											v-model="form.active"
											value="1"
											type="radio"
											class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 ml-4"
										/>
										<label
											for="push-everything"
											class="ml-3 block"
										>
											Sim
										</label>
									
										<input
											name="active"
											v-model="form.active"
											type="radio"
											value="0"
											class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 ml-4"
										/>
										<label
											for="push-email"
											class="ml-3 block"
										>
											Não
										</label>
									</div>

									<!-- <select
										required
										v-model="form.active"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									>
										<option value="1">Sim</option>
										<option value="0">Não</option>
									</select> -->

								</div>

								<div>
									<label for="code">Matrícula</label>
									<input
										readonly
										type="number"
										v-model="form.code"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>

								<div>
									<label for="name">Nome</label>
									<input
										required
										type="text"
										v-model="form.name"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
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

							<!-- <fieldset class="mt-2 mb-2">
								<legend class="text-blue-900 mt-4">CONTATOS</legend>
								<div>
									<label for="ddd">DDD</label>
									<input
										required
										type="number"
										v-model="form.ddd"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
								<div>
									<label for="phone">Telefone Principal</label>
									<input
										required
										type="number"
										v-model="form.phone"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
								<div>
									<label for="ddd">Email Principal</label>
									<input
										required
										type="email"
										v-model="form.email"
										class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									/>
								</div>
							</fieldset> -->

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
	</PopupLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import PopupLayout from "@/Layouts/PopupLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";
import InputSelect from "@/Pages/Form/InputSelect.vue";

export default {
	components: {
		Head,
		Link,
		PopupLayout,
		InputText,
		InputNumber,
		InputSelect,
	},
	props: {
		associate: Object,
		address: Object,
		errors: Object,
		// phone: Object,
		// email: Object,
	},
	setup(props) {
		const form = useForm({
			code: props.associate.code,
			name: props.associate.name,
			cpf: props.associate.cpf,
			rg: props.associate.rg,
			birth: props.associate.birth,
			level_id: props.associate.level_id,
			active: props.associate.active,
			comment: props.associate.comment,
			zipcode: props.address.zipcode,
			state: props.address.state,
			city: props.address.city,
			district: props.address.district,
			address: props.address.address,
			number: props.address.number,
			complement: props.address.complement,
			// ddd: props.phone.ddd,
			// phone: props.phone.number,
			// email: props.email.email,
		});

		return { form };
	},
	methods: {
		submit() {
			this.form.put(route("associates.update", this.associate.id));
		},
		// searchAddress() {
		// 	axios
		// 		.get(route("address.search", { zipcode: this.form.zipcode }))
		// 		.then((response) => {
		// 			this.form.state = response.data.uf;
		// 			this.form.city = response.data.localidade;
		// 			this.form.district = response.data.bairro;
		// 			this.form.address = response.data.logradouro;
		// 			this.form.complement = response.data.complemento;
		// 			this.form.ddd = response.data.ddd;
		// 			this.$refs.number.focus();
		// 		});
		// },
	},
};
</script>
