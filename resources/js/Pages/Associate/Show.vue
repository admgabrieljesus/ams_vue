<template>
	<AppPopup>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Dados do Associado
			</h1>
		</template>

		<div class="py-2">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<Link
						class="text-white bg-green-700 px-2 py-2 ml-3 mt-2 mb-5 rounded"
						:href="route('associates.edit', associate.id)"
					>
						Alterar Dados Pessoais e Endereço
					</Link>

					<div class="p-2 bg-white border-b border-gray-200">
						<fieldset>
							<legend class="text-blue-900">DADOS PESSOAIS</legend>

							<table class="min-w-full divide-y divide-gray-200">
								<tr>
									<td>Associado?</td>
									<td>{{ associate.active == 1 ? "SIM" : "NÃO" }}</td>
								</tr>

								<tr>
									<td>Matrícula</td>
									<td>{{ associate.code }}</td>
								</tr>

								<tr>
									<td>Nome</td>
									<td>{{ associate.name }}</td>
								</tr>

								<tr>
									<td>CPF</td>
									<td>{{ associate.cpf }}</td>
								</tr>

								<tr>
									<td>RG</td>
									<td>{{ associate.rg }}</td>
								</tr>

								<tr>
									<td>Data de Nascimento</td>
									<td>
										{{ associate.birth != "2022-01-01" ? formatDate(associate.birth) : "" }}
									</td>
								</tr>

								<tr>
									<td>Situação</td>
									<td>
										{{ associate.level_id == 1 ? "Ativo" : "Aposentado" }}
									</td>
								</tr>

								<tr>
									<td>Observações</td>
									<td>{{ associate.comment }}</td>
								</tr>
							</table>
						</fieldset>

						<fieldset class="mt-2 mb-2">
							<legend class="text-blue-900 mt-4">ENDEREÇO</legend>

							<table
								v-for="address in addresses"
								:key="address.id"
								class="min-w-full divide-y divide-gray-200"
							>
								<tr>
									<td>Logradouro</td>
									<td>{{ address.address }}</td>
								</tr>

								<tr>
									<td>Número</td>
									<td>{{ address.number }}</td>
								</tr>

								<tr>
									<td>Complemento</td>
									<td>{{ address.complement }}</td>
								</tr>

								<tr>
									<td>Bairro</td>
									<td>{{ address.district }}</td>
								</tr>

								<tr>
									<td>Cidade</td>
									<td>{{ address.city }}</td>
								</tr>

								<tr>
									<td>Estado</td>
									<td>{{ address.state }}</td>
								</tr>

								<tr>
									<td>CEP</td>
									<td>{{ address.zipcode }}</td>
								</tr>
							</table>
						</fieldset>

						<fieldset class="mt-2 mb-2">
							<legend class="text-blue-900 mt-4">CONTATO</legend>

							<table class="w-64 divide-y divide-gray-200">
								<tr>
									<td>Telefone(s)</td>
									<td width="10%"></td>
								</tr>
								<tr v-for="phone in phones" :key="phone.id">
									<td>&nbsp;&nbsp;({{ phone.ddd }}) {{ phone.number }}</td>
									<td>
										<button
											@click.prevent="deletePhone(associate.id, phone.id)"
											type="button"
										>
											<svg
												xmlns="http://www.w3.org/2000/svg"
												viewBox="0 0 24 24"
												width="24"
												height="24"
												class="bg-red-500"
											>
												<path
													class="heroicon-ui"
													d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"
												/>
											</svg>
										</button>
									</td>
								</tr>
								<tr>
									<td>
										<a
											@click="showAddPhone = true"
											href="#"
											style="background-color: #149b82;"
											class="mt-2 mb-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
										>
											Adicionar Telefone
										</a>
									</td>
									<td></td>
								</tr>
							</table>

							<table class="w-80 divide-y divide-gray-200">
								<tr>
									<td>Emails(s)</td>
									<td width="10%"></td>
								</tr>
								<tr v-for="email in emails" :key="email.id">
									<td>&nbsp;&nbsp;{{ email.email }}</td>
									<td>
										<button
											@click.prevent="deleteEmail(associate.id, email.id)"
											type="button"
										>
											<svg
												xmlns="http://www.w3.org/2000/svg"
												viewBox="0 0 24 24"
												width="24"
												height="24"
												class="bg-red-500"
											>
												<path
													class="heroicon-ui"
													
													d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"
												/>
											</svg>
										</button>
									</td>
								</tr>
								<tr>
									<td>
										<a
											@click="showAddEmail = true"
											href="#"
											style="background-color: #149b82;"
											class="mt-2 mb-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
										>
											Adicionar Email
										</a>
									</td>
									<td></td>
								</tr>
							</table>
						</fieldset>
					</div>
				</div>
			</div>
		</div>

		<!-- ADICIONAR TELEFONE -->
		<div
			v-if="showAddPhone"
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
										ADICIONAR TELEFONE
									</h3>
									<div class="mt-2">
										<p class="text-sm text-gray-500">
											Informe DDD e NÚMERO DO TELEFONE
										</p>

										<input
											type="hidden"
											id="associate_id"
											:value="associate.id"
										/>
										<input
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
											required
											type="number"
											v-model="formPhone.ddd"
											placeholder="DDD"
										/>
										<input
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
											required
											type="number"
											v-model="formPhone.number"
											placeholder="NÚMERO"
										/>
									</div>
								</div>
							</div>
						</div>
						<div
							class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
						>
							<button
								@click.prevent="addPhone"
								type="button"
								class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-green-500-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
							>
								Salvar
							</button>
							<button
								@click="showAddPhone = false"
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

		<!-- ADICIONAR EMAIL -->
		<div
			v-if="showAddEmail"
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
										ADICIONAR EMAIL
									</h3>
									<div class="mt-2">
										<p class="text-sm text-gray-500">
											Informe o EMAIL
										</p>

										<input
											type="hidden"
											id="associate_id"
											:value="associate.id"
										/>
										<input
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
											required
											type="email"
											v-model="formEmail.email"
											placeholder="Digite um email válido"
										/>
									</div>
								</div>
							</div>
						</div>
						<div
							class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
						>
							<button
								@click.prevent="addEmail"
								type="button"
								class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
							>
								Salvar
							</button>
							<button
								@click="showAddEmail = false"
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
	</AppPopup>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import AppPopup from "@/Layouts/PopupLayout.vue";

export default {
	components: {
		Head,
		Link,
		useForm,
		AppPopup,
	},
	setup(props) {
		const formPhone = useForm({
			associate_id: props.associate.id,
			ddd: null,
			number: null,
		});
		const formEmail = useForm({
			associate_id: props.associate.id,
			email: null,
		});
		return { formPhone, formEmail };
	},
	data: () => ({
		showUpdateAssociate: false,
		showAddPhone: false,
		showAddEmail: false,
	}),
	props: {
		associate: Object,
		addresses: Object,
		phones: Object,
		emails: Object,
	},
	methods: {
		// Adiciona Especialidade
		addPhone() {
			this.formPhone.post(route("associates.phones.store"), {
				preserveScroll: true,
				onSuccess: () => this.formPhone.reset(),
			});
			this.showAddPhone = false;
		},

		// Adiciona Especialidade
		addEmail() {
			this.formEmail.post(route("associates.emails.store"), {
				preserveScroll: true,
				onSuccess: () => this.formEmail.reset(),
			});
			this.showAddEmail = false;
		},

		// Remove Especialidade
		deletePhone(associate, phone) {
			this.formPhone.delete(
				route("associates.phones.delete", {
					associate_id: associate,
					phone_id: phone,
				}),
				{
					preserveScroll: true,
				}
			);
		},
		// Remove Especialidade
		deleteEmail(associate, email) {
			this.formEmail.delete(
				route("associates.emails.delete", {
					associate_id: associate,
					email_id: email,
				}),
				{
					preserveScroll: true,
				}
			);
		},
		// Formata Data
		formatDate(dateString) {
			const date = new Date(dateString);
			const options = {
				year: "numeric",
				month: "numeric",
				day: "numeric",
				// hour: "numeric",
				// minute: "numeric",
				// second: "numeric",
				// hour12: false,
				// timeZone: "America/Sao_Paulo",
			};
			// Then specify how you want your dates to be formatted
			return new Intl.DateTimeFormat("default", options).format(date);
		},
	},
};
</script>
