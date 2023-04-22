<template>
  <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Painel
            </h2>
        </template>
  <div>
    <H1>Erro</H1>
    <div>{{ error[2] }}</div>
  </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
     components: {
            AppLayout,
        },
  props: {
    error: Object,
  },
  computed: {
    title() {
      return {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
      }[this.error]
    },
    description() {
      return {
        503: 'Sorry, we are doing some maintenance. Please check back soon.',
        500: 'Whoops, something went wrong on our servers.',
        404: 'Sorry, the page you are looking for could not be found.',
        403: 'Sorry, you are forbidden from accessing this page.',
      }[this.error]
    },
  },
}
</script>