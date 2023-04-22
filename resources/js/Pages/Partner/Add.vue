<template>
	<app-guest title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				<span v-if="type == 'doctors'"
					>Solicitação de Cadastro de Conveniado - Pessoa Física</span
				>
				<span v-if="type == 'companies'"
					>Solicitação de Cadastro de Conveniado - Clínicas Médicas</span
				>
				<span v-if="type == 'radiologies'"
					>Solicitação de Cadastro de Conveniado - Clínicas de Imagem</span
				>
				<span v-if="type == 'laboratories'"
					>Solicitação de Cadastro de Conveniado - Laboratórios</span
				>
			</h1>
			<p><a :href="route('partners.menu')">Voltar</a></p>
		</template>

		<div class="py-2 text-sm">
			<div class="max-w-full mx-auto sm:px-6 lg:px-8">
				<div class="pl-3 pr-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<div v-if="errors[0] != null">
						<h1>Erro</h1>
						<p
							class="bg-yellow-400 text-red-600 font-extrabold px-2 py-4 ml-10 mt-2 mb-2"
							v-for="error in errors"
							:key="error"
						>
							{{ error }}
						</p>
					</div>

					<form @submit.prevent="submit">
						<input type="hidden" v-model="form.type" readonly />

						<fieldset v-if="type == 'doctors'">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								IDENTIFICAÇÃO
							</legend>
							<p class="mb-2">
								Preencha corretamente os dados do formulário. Estes dados serão
								usados na confecção do contrato de convênio.
							</p>

							<input-text
								title="NOME"
								v-model="form.name"
								required
								:error="errors.name"
							/>

							<input-text
								mask="###.###.###-##"
								title="CPF"
								v-model="form.cpf"
								required
								:error="errors.cpf"
							/>

							<input-select
								title="TIPO DE DOCUMENTO"
								v-model="form.type_document"
								:itens="options_type_document"
								:error="errors.type_document"
								required
							/>

							<input-number
								title="NÚMERO REGISTRO PROFISSIONAL(CREMEB/CROBA/CREFITO/CRF)"
								v-model="form.number_document"
								:error="errors.number_document"
								required
							/>
						</fieldset>

						<fieldset v-if="type != 'doctors'">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								IDENTIFICAÇÃO
							</legend>

							<p class="mb-2">
								Preencha corretamente os dados do formulário. Estes dados serão
								usados na confecção do contrato de convênio.
							</p>

							<input-text
								title="RAZÃO SOCIAL"
								v-model="form.name"
								required
								:error="errors.name"
							/>

							<input-text
								title="NOME FANTASIA"
								v-model="form.fantasy"
								:error="errors.fantasy"
								required
							/>

							<input-text
								mask="##.###.###/####-##"
								title="CNPJ"
								v-model="form.cnpj"
								required
								:error="errors.cnpj"
							/>
						</fieldset>

						<fieldset class="mt-5" v-if="type != 'doctors'">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								RESPONSÁVEL PELO CONVÊNIO
							</legend>

							<p class="mb-2">
								Preencha corretamente os dados do responsável pelo convênio.
								Estes dados serão usados na confecção do contrato de convênio.
							</p>

							<input-text
								title="NOME COMPLETO"
								v-model="form.name_responsible"
								:error="errors.name_responsible"
								required
							/>

							<input-text
								mask="###.###.###-##"
								title="CPF"
								v-model="form.cpf_responsible"
								:error="errors.cpf_responsible"
								required
							/>

							<input-select
								title="TIPO DE DOCUMENTO"
								v-model="form.type_document"
								:itens="options_type_document"
								:error="errors.type_document"
								required
							/>

							<input-number
								title="NÚMERO CREMEB/CROBA/CREFITO/CRF"
								v-model="form.number_document"
								:error="errors.number_document"
								required
							/>
						</fieldset>

						<fieldset class="mt-5">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								ENDEREÇO
							</legend>

							<p class="mb-2">
								Preencha corretamente o CEP, complemento e número. Os demais
								dados serão recuperados de forma automática da base de dados.
							</p>

							<div class="mt-2">
								<label>CEP</label>
								<input
									@blur.prevent="searchAddress"
									required
									type="number"
									v-model="form.zipcode"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									:error="errors.cep"
								/>
							</div>

							<input-text
								title="ENDEREÇO"
								v-model="form.address"
								required
								:error="errors.address"
							/>

							<input-text
								title="NÚMERO"
								v-model="form.number"
								required
								:error="errors.number"
							/>

							<input-text
								title="COMPLEMENTO"
								v-model="form.complement"
								:error="errors.complement"
							/>

							<input-text
								title="BAIRRO"
								v-model="form.district"
								required
								:error="errors.district"
							/>

							<input-text
								title="CIDADE"
								v-model="form.city"
								required
								:error="errors.city"
							/>

							<input-text
								title="ESTADO"
								v-model="form.state"
								required
								:error="errors.state"
							/>
						</fieldset>

						<fieldset class="mt-5">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								DADOS DE CONTATO
							</legend>

							<p class="mb-2">
								Informe telefone, email e website.
							</p>

							<input-number
								title="DDD"
								v-model="form.ddd"
								required
								:error="errors.ddd"
							/>

							<input-text
								mask="#####-####"
								title="TELEFONE"
								v-model="form.phone"
								required
								:error="errors.phone"
							/>

							<div class="mt-2">
								<label>EMAIL</label>
								<input
									required
									type="email"
									v-model="form.email"
									:error="errors.email"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>

							<div class="mt-2">
								<label>WEBSITE</label>
								<input
									placeholder="http://"
									type="url"
									v-model="form.website"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								/>
							</div>
						</fieldset>

						<fieldset class="mt-5">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								DOCUMENTAÇÃO E ESPECIALIDADES (em formato PDF, PNG, JPG, JPEG ou
								GIF)
							</legend>

							<p class="mb-2 text-red-600">Tamanho máximo permitido por documento: 5MB</p>

							<p class="mb-2">
								Faça o upload dos documentos exigidos e informe a(s)
								especialidade(s) que serão atendidas pelo convênio.
							</p>

							<p class="mb-2">
								Todos os documentos solicitados são obrigatórios. A solicitação
								de pré-cadastro só poderá ser enviada após a inclusão de todos
								os documentos solicitados.
							</p>

							<div class="mt-2">
								<label>CREDENCIAMENTO AMS / APS PETROBRÁS </label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_credenciamento"
									id="document_credenciamento"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_credenciamento = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2">
								<label>ALVARÁ DE FUNCIONAMENTO</label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_alvara"
									id="document_alvara"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_alvara = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type == 'doctors'">
								<label>REGISTRO NO CONSELHO REGIONAL</label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_registro"
									id="document_registro"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_registro = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type == 'doctors'">
								<label>CERTIFICADO DA ESPECIALIZAÇÃO</label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_certificado"
									id="document_certificado"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_certificado = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type == 'doctors'">
								<label>CPF</label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_cpf"
									id="document_cpf"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_cpf = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type == 'doctors'">
								<label>IDENTIDADE (RG)</label>
								<input
									type="file"
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_identidade"
									id="document_identidade"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_identidade = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type != 'doctors'">
								<label
									>CONTRATO SOCIAL DA EMPRESA (com última atualização)</label
								>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_contrato"
									id="document_contrato"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_contrato = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type != 'doctors'">
								<label>CPF DO RESPONSÁVEL TÉCNICO</label>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_cpf"
									id="document_cpf"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_cpf = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type != 'doctors'">
								<label>IDENTIDADE (RG) DO RESPONSÁVEL TÉCNICO</label>
								<input
									type="file"
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_identidade"
									id="document_identidade"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_identidade = $event.target.files[0]"
								/>
							</div>

							<div class="mt-2" v-if="type != 'doctors'">
								<label
									>REGISTRO NO CONSELHO REGIONAL DO RESPONSÁVEL TÉCNICO</label
								>
								<input
									type="file"
									required
									accept=".pdf, .png, .jpg, .jpeg, .gif"
									name="document_registro"
									id="document_registro"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
									@input="form.document_registro = $event.target.files[0]"
								/>
							</div>
						</fieldset>

						<fieldset class="mt-5">
							<legend
								style="color: #218c74; font-size: 25px;"
								class="font-bold mt-6"
							>
								TERMO DE CONSENTIMENTO DE USO DE DADOS E CONTRATO DE CONVÊNIO
							</legend>

							<p class="mb-2">
								Leia atentamente o Termo de Consentimento de Uso de Dados e o
								Contrato de Convênio antes de finalizar o cadastro no sistema
								AMS/AEPET-BA.
							</p>

							<div class="mt-2">
								<p>
									<b
										>Ao informar meus dados e clicar no botão 'Enviar
										Solicitação de Cadastro' eu:</b
									><br />
									1) concordo com a
									<a
										target="_blank"
										href="#"
										@click.prevent="readFile"
										class="text-sm text-gray-700 underline"
										>Política de Privacidade</a
									>
									e o
									<a
										target="_blank"
										href="#"
										@click.prevent="getTerm"
										class="text-sm text-gray-700 underline"
										>Termo de Consentimento da AEPET-BA</a
									>
									.<br />
									2) declaro que TODAS as informações acima prestadas são
									verdadeiras, e assumo a inteira responsabilidade pelas
									mesmas.<br />
									3) informo que estou ciente que a inveracidade deste
									preenchimento configura crime previsto no Código Penal
									Brasileiro, passível de apuração na forma da Lei.<br />
									4) aceito os Termos do Contrato baseado na
									<a
										target="_blank"
										href="#"
										@click.prevent="getContract"
										class="text-sm text-gray-700 underline"
										>Minuta dos Termos do Contrato</a
									>
									e autorizo minha inclusão no convênio AMS/AEPET-BA.
								</p>
							</div>
						</fieldset>
						<button
							type="submit"
							style="background-color: #218c74;"
							class="mt-5 mb-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						>
							Enviar Solicitação de Cadastro
						</button>
					</form>
				</div>
			</div>
		</div>

		<div
			v-if="showContrato"
			style="
				position: fixed;
				margin-top: 10px;
				top: 0;
				left: 10px;
				padding: 5px;
				width: 900px;
				height: 600px;
				background-color: #ddd;
				transition: opacity 0.3s ease;
				overflow-y: auto;
				border: 1px solid black;
			"
		>
			<div>
				<button
					@click="getContract"
					type="button"
					style="background-color: #218c74;"
					class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
				>
					Fechar
				</button>
			</div>

			<div>
				<slot
					name="body"
					style="
						width: 100%;
						height: 100%;
						margin: 5px;
						padding: 10px;
						background-color: #eee;
						border-radius: 1px;
						font-family: Helvetica, Arial, sans-serif;
					"
				>
					<contract-doctor v-if="type == 'doctors'" />
					<contract-company v-if="type == 'companies'" />
					<contract-laboratory v-if="type == 'laboratories'" />
					<contract-radiology v-if="type == 'radiologies'" />
				</slot>
			</div>
			<div>
				<button
					@click="getContract"
					type="button"
					style="background-color: #218c74;"
					class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
				>
					Fechar
				</button>
			</div>
		</div>

		<div
			v-if="showTerm"
			style="
				position: fixed;
				margin-top: 10px;
				top: 0;
				left: 10px;
				padding: 5px;
				width: 900px;
				height: 600px;
				background-color: #ddd;
				transition: opacity 0.3s ease;
				overflow-y: auto;
				border: 1px solid black;
			"
		>
			<div>
				<button
					@click="getTerm"
					type="button"
					style="background-color: #218c74;"
					class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
				>
					Fechar
				</button>
			</div>

			<div>
				<slot
					name="body"
					style="
						width: 100%;
						height: 100%;
						margin: 5px;
						padding: 10px;
						background-color: #eee;
						border-radius: 1px;
						font-family: Helvetica, Arial, sans-serif;
					"
				>
					<term />
				</slot>
			</div>
			<div>
				<button
					@click="getTerm"
					type="button"
					style="background-color: #218c74;"
					class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
				>
					Fechar
				</button>
			</div>
		</div>
	</app-guest>
</template>

<script>
import { defineComponent } from "vue";
import AppGuest from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";
import InputSelect from "@/Pages/Form/InputSelect.vue";
import ContractDoctor from "@/Pages/Contracts/Doctor.vue";
import ContractCompany from "@/Pages/Contracts/Company.vue";
import ContractLaboratory from "@/Pages/Contracts/Laboratory.vue";
import ContractRadiology from "@/Pages/Contracts/Radiology.vue";
import Term from "@/Pages/Contracts/Term.vue";

export default defineComponent({
	components: {
		AppGuest,
		Head,
		Link,
		InputText,
		InputNumber,
		InputSelect,
		ContractDoctor,
		ContractCompany,
		ContractLaboratory,
		ContractRadiology,
		Term,
	},
	data: () => ({
		options_type_document: [
			{ name: "CREMEB", id: "CREMEB" },
			{ name: "CROBA", id: "CROBA" },
			{ name: "CREFITO", id: "CREFITO" },
			{ name: "CRF", id: "CRF" },
		],
		showContrato: false,
		showTerm: false,
	}),
	props: {
		type: String,
		errors: Object,
	},
	setup(props) {
		const form = useForm({
			name: null,
			fantasy: null,
			cnpj: null,
			cpf: null,
			number_document: null,
			type_document: null,
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
			website: null,
			type: props.type,
			name_responsible: null,
			cpf_responsible: null,

			// name: "GABRIEL DE JESUS FILHO",
			// fantasy: "EMEC LTDA",
			// cnpj: 22333444000100,
			// cpf: 50738500500,
			// number_document: 258951,
			// type_document: "CREMEB",
			// zipcode: 40800420,
			// state: "BA",
			// city: "SALVADOR",
			// district: "PARIPE",
			// address: "RUA MARQUÊS DE OLINDA",
			// number: "399",
			// complement: "CASA E",
			// ddd: 71,
			// phone: 985468521,
			// email: "gabriel.jesus.filho@gmail.com",
			// website: "http://gabrielfilho.eti.br",
			// type: props.type,
			// name_responsible: "LUCIMAR SANTOS DE JESUS",
			// cpf_responsible: 37052780534,

			document_credenciamento: null,
			document_registro: null,
			document_certificado: null,
			document_identidade: null,
			document_cpf: null,
			document_alvara: null,
			document_contrato: null,
		});
		return { form };
	},
	methods: {
		submit() {
			this.form.post(route("partners.include"));
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
					//this.$refs.number.focus();
				});
		},
		getContract() {
			//this.form.post(this.route("partners.contract", { type: this.form.type }));
			this.showContrato = !this.showContrato;
		},
		getTerm() {
			//this.form.get(this.route("terms.agree"));
			this.showTerm = !this.showTerm;
		},
		readFile() {
			window.open(
				"https://www.aepetba.org.br/v1/politica-de-privacidade/",
				"",
				"width=800,height=400"
			);
		},
	},
});
</script>
