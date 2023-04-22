<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Conveniado(a) {{ partner.name }}
			</h1>
		</template>

		<!-- This example requires Tailwind CSS v2.0+ -->
		<div class="ml-40 mt-5 mr-40 bg-white shadow overflow-hidden sm:rounded-lg">
			<div class="px-4 py-5 sm:px-6">
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					Informações
				</h3>
				<p class="mt-1 max-w-2xl text-sm text-gray-500">
					Dados Pessoais
				</p>
			</div>

			<div class="border-t border-gray-200">
				<dl>
					<div
						class="bg-gray-50 px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							NOME / RAZÃO SOCIAL
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-Z">
							{{ partner.name }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							NOME FANTASIA
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ partner.fantasy }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							CPF
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ partner.cpf }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							CNPJ
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ partner.cnpj }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							{{ partner.type_document }}
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ partner.number_document }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							EMAIL
						</dt>
						<dd
							v-for="email in emails"
							:key="email.id"
							class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
						>
							{{ email.email }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							TELEFONE
						</dt>
						<dd
							v-for="phone in phones"
							:key="phone.id"
							class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
						>
							({{ phone.ddd }}) {{ phone.number }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							ENDEREÇO
						</dt>
						<dd
							v-for="address in addresses"
							:key="address.id"
							class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
						>
							{{ address.address }}, {{ address.number }},
							{{ address.complement }}, {{ address.district }}<br />
							{{ address.city }} - {{ address.state }}<br />
							CEP: {{ address.zipcode }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							ESPECIALIDADES
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 w-full">
							<div class="w-full flex-1 flex items-center" v-for="speciality in specialities" :key="speciality.id">
								<div>{{ speciality.title }}</div>

								<div>
									<button @click.prevent="deleteSpeciality(partner.id, speciality.id)" type="button">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 24 24"
											width="24"
											height="24"
										>
											<path
												class="heroicon-ui"
												d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"
											/>
										</svg>
									</button>
								</div>
							</div>
						</dd>
					</div>


<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							LISTA DE PROFISSIONAIS DA CLÍNICA
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 w-full">
							<div class="w-full flex-1 flex items-center" v-for="doctor in doctors" :key="doctor.id">
								<div>{{ doctor.name }}</div>

								<div>
									<button @click.prevent="deleteDoctor(partner.id, doctor.id)" type="button">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 24 24"
											width="24"
											height="24"
										>
											<path
												class="heroicon-ui"
												d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"
											/>
										</svg>
									</button>
								</div>
							</div>
						</dd>
					</div>


					<div
						v-if="responsible != null"
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							RESPONSÁVEL PELO CONVÊNIO
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<p>Nome: {{ responsible.name }}</p>

							<p>CPF:{{ responsible.cpf }}</p>

							<p>
								{{ responsible.type_document }}:
								{{ responsible.number_document }}
							</p>
						</dd>
					</div>

					<div
						class="bg-white px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							DOCUMENTOS
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<ul
								role="list"
								class="border border-gray-200 rounded-md divide-y divide-gray-200"
							>
								<li
									v-for="file in files"
									:key="file.id"
									class="pl-3 pr-4 py-1 flex items-center justify-between text-sm"
								>
									<div class="w-0 flex-1 flex items-center">
										<svg
											class="flex-shrink-0 h-5 w-5 text-gray-400"
											xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 20 20"
											fill="currentColor"
											aria-hidden="true"
										>
											<path
												fill-rule="evenodd"
												d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
												clip-rule="evenodd"
											/>
										</svg>
										<span class="ml-2 flex-1 w-0 truncate">
											<button
												@click="
													readFile(
														'partners',
														partner.id,
														getName(file),
														getExtension(file)
													)
												"
											>
												{{ getDocument(file) }}
											</button>
										</span>

										<!-- <a
											target="_blank"
											:href="
												route('files.view', {
													type: 'partners',
													id: partner.id,
													name: getName(file),
													extension: getExtension(file),
												})
											"
										>
											Visualizar
										</a> -->
									</div>
								</li>
							</ul>
						</dd>
					</div>
				</dl>
			</div>
			<div class="ml-10 mt-5">
				<form @submit.prevent="submit">
					<p>
						Se os dados e a documentação estiverem corretos, clique no botão
						'Validar e Confirmar' para confirmar o cadastro do conveniado.<br />
						Após a confirmação será enviado um email com a senha de acesso para
						o novo conveniado. <br />Se necessário, registre observações sobre a
						validação deste cadastro e/ou anexe o email de autorização de
						cadastro.
					</p>

					<input v-model="form.id" type="hidden" />

					<label class="mt-2" for=""><b>Observações</b></label>
					<br />
					<textarea
						class="mt-2 w-full"
						rows="2"
						v-model="form.comment"
					></textarea>
					<br />
					<label class="mt-2" for=""
						><b
							>Email de Autorização (para cadastros com documentação
							incompleta)</b
						></label
					>
					<br />
					<input
						type="file"
						accept=".pdf, .png, .jpg, .jpeg, .gif"
						name="document_autorizacao"
						id="document_autorizacao"
						class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
						@input="form.document_autorizacao = $event.target.files[0]"
					/>
					<br />

					<input-select
						title="SITUAÇÃO"
						v-model="form.active"
						:itens="options_active"
						required
					/>

					<br />
					<p v-if="user.length <= 0" class="text-red-700">
						Crie o usuário do conveniado depois da validação do cadastro.
					</p>
					<button
						type="submit"
						class="mt-2 mb-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
					>
						Validar Cadastro
					</button>

					&nbsp;
					<a
						v-if="partner.type == 'DOCTORS'"
						@click="showAddModal = true"
						href="#"
						class="mt-2 mb-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
					>
						Associar Especialidade(s)
					</a>

					&nbsp;

					<a
						v-if="user.length <= 0 && showButtonUser == 1"
						:href="route('partners.user.add', partner.id)"
						class="mt-2 mb-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						@click.prevent="addUser"
					>
						Criar Usuário
					</a>
					<br />
					<p v-if="user.length > 0">
						Já existe usuário para este conveniado.<br />
						Email usado:<b>{{ user[0].email }}</b>
					</p>
					<br />
				</form>
			</div>
		</div>

		<div
			v-if="showAddModal"
			class="fixed z-10 inset-0 overflow-y-auto"
			aria-labelledby="modal-title"
			role="dialog"
			aria-modal="true"
		>
			<div
				class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
			>
				<div
					class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
					aria-hidden="true"
				></div>

				<span
					class="hidden sm:inline-block sm:align-middle sm:h-screen"
					aria-hidden="true"
					>&#8203;</span
				>

				<div
					class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
				>
					<form @submit.prevent="submit">
						<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
							<div class="sm:flex sm:items-start">
								<div
									class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
								>
									<svg
										class="h-6 w-6 text-red-600"
										xmlns="http://www.w3.org/2000/svg"
										fill="none"
										viewBox="0 0 24 24"
										stroke="currentColor"
										aria-hidden="true"
									>
										<path
											stroke-linecap="round"
											stroke-linejoin="round"
											stroke-width="2"
											d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
										/>
									</svg>
								</div>
								<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
									<h3
										class="text-lg leading-6 font-medium text-gray-900"
										id="modal-title"
									>
										ADICIONAR ESPECIALIDADE
									</h3>
									<div class="mt-2">
										<p class="text-sm text-gray-500">
											Selecione uma Especialidade para associar ao conveniado
										</p>

										<input type="hidden" id="partner_id" :value="partner.id" />
										<select
											v-model="formSpecility.speciality_id"
											name="speciality_id"
											id="speciality_id"
											required
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
										>
											<option
												v-for="speciality in specialities_all"
												:key="speciality.id"
												:value="speciality.id"
												>{{ speciality.title }}</option
											>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div
							class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
						>
							<button
								@click.prevent="addSpeciality"
								type="button"
								class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
							>
								Salvar
							</button>
							<button
								@click="showAddModal = false"
								type="button"
								class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
							>
								Cancelar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import InputSelect from "@/Pages/Form/InputSelect.vue";

export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
		InputSelect,
	},
	data: () => ({
		options_active: [
			{ name: "INATIVO", id: "0" },
			{ name: "ATIVO", id: "1" },
			{ name: "PENDENTE", id: "2" },
		],
		showButtonUser: 1,
		showAddModal: false,
	}),
	props: {
		partner: Object,
		emails: Object,
		phones: Object,
		addresses: Object,
		responsible: Object,
		specialities: Object,
		specialities_all: Object,
		files: Object,
		user: Object,
		doctors: Object,
	},
	setup(props) {
		const form = useForm({
			comment: null,
			document_autorizacao: null,
			id: props.partner.id,
			active: props.partner.active,
		});
		const formSpecility = useForm({
			partner_id: props.partner.id,
			speciality_id: null,
		});
		return { form, formSpecility };
	},
	methods: {
		getName(name) {
			return name.split("/")[3].split(".")[0];
		},
		getExtension(name) {
			return name.split(".")[1];
		},
		getDocument(name) {
			return name.split("/")[3];
		},
		submit() {
			this.form.post(route("partners.check"));
		},
		addUser() {
			this.form.get(this.route("partners.user.add"));
			axios
				.get(route("partners.user.find", { id: this.partner.id }))
				.then((response) => {
					this.showButtonUser = 0;
					this.user = response.data;
				});
		},
		// Adiciona Especialidade
		addSpeciality() {
			this.formSpecility.post(route("partners.specialities.store"), {
				preserveScroll: true,
				onSuccess: () => this.formSpecility.reset(),
			});
			this.showAddModal = false;
		},
		// Remove Especialidade
		deleteSpeciality(partner, speciality) {
			this.formSpecility.post(route("partners.specialities.delete", { partner_id : partner, speciality_id: speciality}), {
				preserveScroll: true,
			});
		},
		// Visualiza Arquivo
		readFile(vtype, vid, vname, vextension) {
			var result = "";

			axios
				.get(
					route("files.view", {
						type: "partners",
						id: vid,
						name: vname,
						extension: vextension,
					})
				)
				.then((response) => {
					result = "/" + response.data;
					window.open(result, "", "width=800,height=400");
				});
		},
	},
});
</script>
