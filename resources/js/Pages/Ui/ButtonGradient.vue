<template>
	<Link
		class="border border-green-500 bg-green-500 rounded-md px-2 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline text-black font-bold  bg-gradient-to-r from-blue-400 via-green-300 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 text-sm text-center  w-full"
		:href="route(link)"
	>
		
		{{ title }}
	</Link>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
	components: {
		Head,
		Link,
	},
	props: {
		title: String,
		link: String,
	},
};
</script>
