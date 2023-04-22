<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Solicitação de Inclusão de Dependente
			</h1>
		</template>

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
								<label>NOME</label>
								<input
									required
									type="text"
									v-model="form.name"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>

							<div class="mt-2">
								<input-text
									mask="###.###.###-##"
									title="CPF"
									v-model="form.cpf"
									required
									:error="errors.cpf"
								/>
							</div>

							<div class="mt-2">
								<label>RG</label>
								<input
									type="number"
									v-model="form.rg"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>

							<div class="mt-2">
								<label>DATA DE NASCIMENTO</label>
								<input
									required
									type="date"
									v-model="form.birth"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>

							<div class="mt-2">
								<label>PARENTESCO</label>
								<select
									required
									v-model="form.kindship_id"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								>
									<option
										v-for="kindship in kindships"
										:key="kindship.id"
										:value="kindship.id"
									>
										{{ kindship.title }}
									</option>
								</select>
							</div>

							<div class="mt-2">
								<label>COMPROVANTE DE PAGAMENTO DA TAXA DE INSCRIÇÃO</label>
								<p>
									Dados para depósito<br />
									Ag.: 3158-5<br />C/c 217556-8<br />
									CNPJ: 32.605.958/0001-00
								</p>
								<input
									type="file"
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_pagamento"
									id="document_pagamento"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_pagamento = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2">
								<label>DECLARAÇÃO</label>
								<p>
									<b
										>Ao informar meus dados e clicar no botão 'Enviar
										Solicitação' eu:</b
									><br />
									1) declaro que TODAS as informações acima prestadas são
									verdadeiras, e assumo a inteira responsabilidade pelas
									mesmas.<br />
									2) informo que estou ciente que a inveracidade deste
									preenchimento configura crime previsto no Código Penal
									Brasileiro, passível de apuração na forma da Lei.<br />
								</p>
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
	</AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";
import InputSelect from "@/Pages/Form/InputSelect.vue";

export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
		InputText,
		InputNumber,
		InputSelect,
	},
	props: {
		kindships: Object,
		errors: Object,
	},
	setup(props) {
		const form = useForm({
			name: null,
			cpf: null,
			rg: null,
			birth: null,
			kindship_id: null,
			document_pagamento: null,
		});
		return { form };
	},
	methods: {
		submit() {
			this.form.post(route("dependents.store"));
		},
	},
});
</script>
