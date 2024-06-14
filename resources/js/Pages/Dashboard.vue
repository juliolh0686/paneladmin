<script setup>
import DefaultLayout from '@/Layouts/Tailadmin/DefaultLayout.vue'
import DataStatsOne from '@/Components/Tailadmin/DataStats/DataStatsOne.vue'
import ChartOne from '@/Components/Tailadmin/Charts/ChartOne.vue'
import ChartTwo from '@/Components/Tailadmin/Charts/ChartTwo.vue'
import ChartThree from '@/Components/Tailadmin/Charts/ChartThree.vue'
import MapOne from '@/Components/Tailadmin/Maps/MapOne.vue'
import TableOne from '@/Components/Tailadmin/Tables/TableOne.vue'
import ChatCard from '@/Components/Tailadmin/ChatCard.vue'

</script>

<template>
  <DefaultLayout>
    <div
      class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
    >
      <DataStatsOne />
    </div>

    <div
      class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5"
    >
      <!-- ====== Chart One Start -->
      <ChartOne />
      <!-- ====== Chart One End -->

      <!-- ====== Chart Two Start -->
      <ChartTwo />
      <!-- ====== Chart Two End -->

      <!-- ====== Chart Three Start -->
      <ChartThree />
      <!-- ====== Chart Three End -->

      <!-- ====== Map One Start -->
      <MapOne />
      <!-- ====== Map One End -->

      <!-- ====== Table One Start -->
      <div class="col-span-12 xl:col-span-8">
        <TableOne />
      </div>
      <!-- ====== Table One End -->

      <!-- ====== Chat Card Start -->
      <ChatCard />
      <!-- ====== Chat Card End -->
    </div>
  </DefaultLayout>
</template>
