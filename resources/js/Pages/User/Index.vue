<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Usuários
			</h1>
		</template>

		<div class="py-2">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<div class="p-2 bg-white border-b border-gray-200">
						<div class="mb-4">
							<a href="#" @click="openModal()">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 24 24"
									width="30"
									height="30"
									class="inline"
								>
									<path
										class="heroicon-ui"
										d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"
									/>
								</svg>
								<span
									style="background-color: #086f8f; "
									class="px-3 py-3 mt-5 text-green-100 rounded"
									>Incluir Usuário</span
								>
							</a>
							<input
								type="search"
								v-model="params.search"
								aria-label="Pesquisa"
								placeholder="Pesquisa..."
								class="inline w-60 ml-5 rounded-md border"
								name=""
								id=""
							/>

							<select v-model="params.role" class="ml-3 mt-1 rounded">
								<option value="">-----</option>
								<option value="1">Administrador</option>
								<option value="2">Operador</option>
								<option value="3">Usuário</option>
								<option value="4">Auditor</option>
								<option value="5">Associado</option>
								<option value="7">Conveniado</option>
							</select>

							<select v-model="params.active" class="ml-3 mt-1 rounded">
								<option value="">-----</option>
								<option value="1">Ativo</option>
								<option value="0">Bloqueado</option>
							</select>

							<!-- <label class="ml-5" for="search">Pesquisa</label>
							<input
								type="text"
								id="search"
								v-model="term"
								@keyup="search"
								class="ml-2 px-2 py-1 text-s rounded border"
							/>

						 -->
						</div>
						<table>
							<thead class="font-bold bg-green-700 border-b-2">
								<td class="px-4 py-2">Status</td>
								<td class="px-4 py-2">Atualizado em</td>
								<td class="px-4 py-2">Email</td>
								<th
									scope="col"
									class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
								>
									<span
										class="inline-flex py-3 px-6 w-full justify-between"
										@click="sort('name')"
										>Nome

										<svg
											v-if="
												params.field === 'name' && params.direction === 'asc'
											"
											xmlns="http://www.w3.org/2000/svg"
											class="h-4 w-4"
											viewBox="0 0 20 20"
											fill="currentColor"
										>
											<path
												d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"
											/>
										</svg>

										<svg
											v-if="
												params.field === 'name' && params.direction === 'desc'
											"
											xmlns="http://www.w3.org/2000/svg"
											class="h-4 w-4"
											viewBox="0 0 20 20"
											fill="currentColor"
										>
											<path
												d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"
											/>
										</svg>
									</span>
								</th>
								<td class="px-4 py-2">Grupo</td>
								<td class="px-4 py-2">Ações</td>
							</thead>
							<tbody>
								<tr v-for="user in users.data" :key="user.id">
									<td class="px-4 py-2">
										{{ user.active == 1 ? "ATIVO" : "BLOQUEADO" }}
									</td>
									<td class="px-4 py-2">
										{{ formatDate(user.updated_at) }}
									</td>
									<td class="px-4 py-2">{{ user.email }}</td>
									<td class="px-4 py-2">{{ user.name }}</td>
									<td class="px-4 py-2">
										{{ getRole(user.role_id) }}
									</td>
									<td class="px-4 py-2 font-extrabold">
										<a class="inline-flex" href="#" @click="show(user.id)">
											<svg
												xmlns="http://www.w3.org/2000/svg"
												viewBox="0 0 24 24"
												width="24"
												height="24"
											>
												<path
													class="heroicon-ui"
													d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"
												/>
											</svg>
										</a>
										<a class="inline-flex" href="#" @click="edit(user)">
											<svg
												xmlns="http://www.w3.org/2000/svg"
												viewBox="0 0 24 24"
												width="24"
												height="24"
											>
												<path
													class="heroicon-ui"
													d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"
												/>
											</svg>
										</a>
										<a class="inline-flex" href="#" @click="deleteRow(user)">
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
										</a>
									</td>
								</tr>
							</tbody>
						</table>
						<pagination class="mt-10" :links="users.links" />
					</div>
				</div>
			</div>
		</div>

		<div
			class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
			v-if="isOpen"
		>
			<div
				class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
			>
				<div class="fixed inset-0 transition-opacity">
					<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
				</div>

				<!-- This element is to trick the browser into centering the modal contents. -->

				<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span
				>​

				<div
					class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
					role="dialog"
					aria-modal="true"
					aria-labelledby="modal-headline"
				>
					<form>
						<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
							<div class="">
								<div class="mb-4">
									<label
										for="exampleFormControlInput1"
										class="block text-gray-700 text-sm font-bold mb-2"
										>Nome:</label
									>

									<input
										type="text"
										class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
										id="exampleFormControlInput1"
										placeholder="Nome Completo"
										v-model="userForm.name"
									/>
								</div>

								<div class="mb-4">
									<label
										for="exampleFormControlInput2"
										class="block text-gray-700 text-sm font-bold mb-2"
										>Email:</label
									>

									<textarea
										class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
										id="exampleFormControlInput2"
										v-model="userForm.email"
										placeholder="Email"
									></textarea>
								</div>

								<div class="mb-4">
									<label
										for="exampleFormControlInput2"
										class="block text-gray-700 text-sm font-bold mb-2"
										>Grupo:</label
									>

									<select v-model="userForm.role_id" 	class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										<option value="">-----</option>
										<option value="1">Administrador</option>
										<option value="2">Operador</option>
										<option value="3">Usuário</option>
										<option value="4">Auditor</option>
										<option value="5">Associado</option>
										<option value="7">Conveniado</option>
									</select>
								</div>
							</div>
						</div>

						<div
							class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
						>
							<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
								<button
									wire:click.prevent="store()"
									type="button"
									class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
									v-show="!editMode"
									@click="save(userForm)"
								>
									Salvar
								</button>
							</span>

							<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
								<button
									wire:click.prevent="store()"
									type="button"
									class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
									v-show="editMode"
									@click="update(userForm)"
								>
									Atualizar
								</button>
							</span>

							<span
								class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
							>
								<button
									@click="closeModal()"
									type="button"
									class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
								>
									Cancelar
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div
			class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
			v-if="isShow"
		>
			<div
				class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
			>
				<div class="fixed inset-0 transition-opacity">
					<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
				</div>

				<!-- This element is to trick the browser into centering the modal contents. -->

				<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span
				>​

				<div
					class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
					role="dialog"
					aria-modal="true"
					aria-labelledby="modal-headline"
				>
					<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="">
							<div class="mb-4">
								<label
									for="exampleFormControlInput1"
									class="block text-gray-700 text-sm font-bold mb-2"
									>Nome:</label
								>
								<p>{{ userResult.name }}</p>
							</div>

							<div class="mb-4">
								<label
									for="exampleFormControlInput2"
									class="block text-gray-700 text-sm font-bold mb-2"
									>Email:</label
								>
								<p>{{ userResult.email }}</p>
							</div>
						</div>
					</div>

					<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
						<span
							class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
						>
							<button
								@click="closeModal()"
								type="button"
								class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
							>
								Fechar
							</button>
						</span>
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
import Pagination from "@/Components/Pagination";
import { useForm } from "@inertiajs/inertia-vue3";
import { pickBy, throttle } from "lodash";

export default {
	components: {
		Head,
		Link,
		AppLayout,
		Pagination,
	},
	data() {
		return {
			userForm: {
				name: null,
				email: null,
			},
			editMode: false,
			isOpen: false,
			isShow: false,
			params: {
				search: this.filters.search,
				role: this.filters.role,
				active: this.filters.active,
				field: this.filters.field,
				direction: this.filters.direction,
			},
			userResult: null,
		};
	},
	watch: {
		params: {
			handler: throttle(function () {
				let params = pickBy(this.params);
				this.$inertia.get(this.route("users.index"), params, {
					replace: true,
					preserveState: true,
				});
			}, 150),
			deep: true,
		},
	},
	props: {
		users: Object,
		filters: Object,
		errors: Object,
		data: Object,
		user: Object,
	},
	setup(props) {
		const form = useForm({
			filter: null,
		});
		return { form };
	},
	methods: {
		sort(field) {
			this.params.field = field;
			this.params.direction = this.params.direction === "asc" ? "desc" : "asc";
		},
		search: _.throttle(function () {
			this.$inertia.replace(
				route("users.index", { term: this.term, status: this.status })
			);
		}, 200),
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

		getRole(role) {
			var roles = [
				"Administrador",
				"Operador",
				"Usuário Comum",
				"Auditor",
				"Associado",
				"Dependente",
				"Conveniado",
			];
			return roles[role - 1];
		},
		openModal: function () {
			this.isOpen = true;
		},
		openModalShow: function () {
			this.isShow = true;
		},

		closeModal: function () {
			this.isOpen = false;
			this.isShow = false;
			this.reset();
			this.editMode = false;
		},

		reset: function () {
			this.form = {
				title: null,
				body: null,
			};
		},

		save: function (data) {
			this.$inertia.post("/users", data);
			this.reset();
			this.closeModal();
			this.editMode = false;
		},

		edit: function (data) {
			this.userForm = Object.assign({}, data);
			this.editMode = true;
			this.openModal();
		},

		update: function (data) {
			data._method = "PUT";
			this.$inertia.post("/users/" + data.id, data);
			this.reset();
			this.closeModal();
		},

		show: function (id) {
			axios.get(route("users.show", { id: id })).then((response) => {
				this.userResult = response.data;
				this.openModalShow();
			});
		},

		deleteRow: function (data) {
			if (!confirm("Tem certeza que deseja desativar este usuário?")) return;
			data._method = "DELETE";
			this.$inertia.post("/users/" + data.id, data);
			this.reset();
			this.closeModal();
		},
	},
};
</script>
