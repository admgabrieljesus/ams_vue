<template>
	<div>
			<main>
				<slot></slot>
			</main>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FooterDefault from "@/Pages/Ui/Footer.vue";

export default defineComponent({
	props: {
		title: String,
	},

	components: {
		Head,
		JetApplicationMark,
		JetBanner,
		Link,
		FooterDefault,
	},
});
</script>
