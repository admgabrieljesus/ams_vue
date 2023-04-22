<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Dependente {{ dependent.name }}
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
							{{ dependent.name }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							CPF
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ dependent.cpf }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							RG
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ dependent.rg }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							DATA DE NASCIMENTO
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ dependent.birth }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							PARENTESCO
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ kindship.title }}
						</dd>
					</div>

					<div
						class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
					>
						<dt class="text-sm font-medium text-gray-500">
							STATUS
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ dependent.active }}
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
										<!-- Heroicon name: solid/paper-clip -->
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
											{{ getDocument(file) }}
										</span>
									</div>
									<div class="ml-4 flex-shrink-0">
										<a
											target="_blank"
											:href="
												route('files.view', {
													type: 'dependents',
													id: dependent.id,
													name: getName(file),
													extension: getExtension(file),
												})
											"
										>
											Visualizar
										</a>
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
						'Validar e Confirmar' para confirmar o cadastro do dependente .<br />
						Após a confirmação a carteira será emitida e disponibilizada.
						<br />Se necessário, registre observações sobre este cadastro.
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

					<button
						type="submit"
						class="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
					>
						Validar e Confirmar
					</button>
				</form>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
	},
	props: {
		dependent: Object,
		kindship: Object,
		files: Object,
	},
	setup(props) {
		const form = useForm({
			comment: null,
			document_autorizacao: null,
			id: props.dependent.id,
		});
		return { form };
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
			this.form.post(route("dependents.check"));
		},
	},
});
</script>
