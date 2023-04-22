<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Associados
			</h1>
		</template>

		<div class="py-2">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<div class="p-2 bg-white border-b border-gray-200">
						<div class="mb-4">
							<Link
								style="background-color: #086f8f;"
								class="px-6 py-2 mb-2 text-green-100 rounded"
								:href="route('associates.create')"
							>
								Cadastrar Associado
							</Link>

							<input
								type="search"
								v-model="params.search"
								aria-label="Pesquisa"
								placeholder="Pesquisa..."
								class="inline w-60 ml-5 rounded-md border"
								name=""
								id=""
							/>

							<select v-model="params.level" class="ml-3 mt-1 rounded">
								<option value="">-----</option>
								<option value="1">Ativos</option>
								<option value="2">Aposentados</option>
							</select>

							<select v-model="params.active" class="ml-3 mt-1 rounded">
								<option value="">-----</option>
								<option value="1">Associados</option>
								<option value="0">Não-associados</option>
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
							<caption>
								Total de associados encontrados: {{ associates.total }}
							</caption>
							<thead class="font-bold bg-green-700 border-b-2">
								<td class="px-4 py-2">Associado</td>
								<td class="px-4 py-2">Atualizado em</td>
								<td class="px-4 py-2">Matrícula</td>
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
								<td class="px-4 py-2">Status</td>
								<td class="px-4 py-2">Ações</td>
							</thead>
							<tbody>
								
<tr class="odd:bg-white even:bg-gray-300"
									v-for="(associate, index) in associates.data"
									:key="associate.id"
								>
									<td class="px-4 py-2">
										{{ associate.active == 1 ? "SIM" : "NÃO" }}
									</td>
									<td class="px-4 py-2">
										{{ formatDate(associate.updated_at) }}
									</td>
									<td class="px-4 py-2">{{ associate.code }}</td>
									<td class="px-4 py-2">{{ associate.name }}</td>
									<td class="px-4 py-2">
										{{ associate.level_id == 1 ? "Ativo" : "Aposentado" }}
									</td>
									<td class="px-4 py-2 font-extrabold">
										<a href="#" @click="openWindow(associate.id)">
											Detalhes
										</a>

										<!-- <Link
											class="text-green-700"
											:href="route('associates.show', associate.id)"
										>
											Detalhes
										</Link> -->

										<!-- <Link
                                            @click="destroy(associate.id)"
                                            class="text-red-700"
                                            >Delete</Link
                                        > -->
									</td>
								</tr>
							</tbody>
						</table>
						<pagination class="mt-10" :links="associates.links" />
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
			params: {
				search: this.filters.search,
				level: this.filters.level,
				active: this.filters.active,
				field: this.filters.field,
				direction: this.filters.direction,
			},
		};
	},
	watch: {
		params: {
			handler: throttle(function () {
				let params = pickBy(this.params);
				this.$inertia.get(this.route("associates.index"), params, {
					replace: true,
					preserveState: true,
				});
			}, 150),
			deep: true,
		},
	},
	props: {
		associates: Object,
		filters: Object,
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
				route("associates.index", { term: this.term, status: this.status })
			);
		}, 200),
		destroy(id) {
			this.$inertia.delete(route("associates.destroy", id));
		},
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
		filterAssociate(filtro) {
			axios
				.get(route("associates.filter", { filter: this.form.filter }))
				.then((response) => {
					//alert(response.data);
					this.associates = response.data;
				});
		},
		openWindow(associate) {
			window.open(
				route("associates.show", associate),
				"",
				"width=800,height=400"
			);
		},
	},
};
</script>
