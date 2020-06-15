<template>
    <div class="min-h-screen flex flex-col">
        <Nav/>
        <div class="flex-grow flex">
            <div class="w-full flex flex-col bg-gray-100">
                <PageHeader :title="title">
                    <template v-slot:page_buttons>
                        <slot name="page_buttons"></slot>
                    </template>
                    <template v-slot:page_description>
                        <slot name="page_description"></slot>
                    </template>
                </PageHeader>
                <PageContent>
                    <slot></slot>
                </PageContent>
            </div>
        </div>
    </div>
</template>

<script>
    import Nav from "../MainLayout/Nav.vue";
    import PageHeader from "../MainLayout/PageHeader.vue";
    import PageContent from "../MainLayout/PageContent.vue";

    export default {
        components: {
            Nav, PageHeader, PageContent
        },
        props:{
            title: {
                type: String,
                default: 'Page',
                required: true
            }
        }
    };
</script>
