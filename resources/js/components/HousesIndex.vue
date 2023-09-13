<template>
    <el-container>
        <el-main>
        <el-col style="width: 70%; margin-left: 15%">
        <div style="width: 90%; padding-left: 2rem; padding-right: 2rem">
            <el-form
                label-position="top"
                label-width="100px"
                :model="filters"
            >
                <el-row :gutter="10">
                    <el-col :xl="12" :lg="12" :md="12" :sm="12" :xs="12">
                        <el-form-item label="Name">
                            <el-input v-model="filters.nameQuery"
                                      placeholder="Enter the name or part of the name..."/>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="10" :justify="space-between">
                    <el-col :xl="2" :md="3" :sm="5" :xs="6">
                        <el-form-item label="Bedrooms">
                            <el-input v-model="filters.bedroomsNumber"/>
                        </el-form-item>
                    </el-col>
                    <el-col :xl="2" :md="3" :sm="5" :xs="6">
                    <el-form-item label="Bathrooms">
                        <el-input v-model="filters.bathroomsNumber"/>
                    </el-form-item>
                    </el-col>
                    <el-col :xl="2" :md="3" :sm="5" :xs="6">
                    <el-form-item label="Storeys">
                        <el-input v-model="filters.storeysNumber"/>
                    </el-form-item>
                    </el-col>
                    <el-col :xl="2" :md="3" :sm="5" :xs="6">
                    <el-form-item label="Garages">
                        <el-input v-model="filters.garagesNumber"/>
                    </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="10">
                    <el-col :xl="6" :sm="12">
                        <el-form-item label="Price range">
                            <el-row :gutter="10" :justify="space-between">
                                <el-col :xl="11" :sm="6" style="margin-bottom: 0.5rem">
                                    <el-input v-model="filters.priceFrom" placeholder="From..." class="w-50"/>
                                </el-col>
                                <el-col :xl="11" :sm="6" style="margin-bottom: 0.5rem">
                                    <el-input v-model="filters.priceTo" placeholder="To..."/>
                                </el-col>
                                <el-col :xl="1" :sm="1" style="margin-bottom: 0.5rem; margin-left: 2rem">
                                    <el-form-item>
                                        <el-button type="primary" @click="getData(this.filters)">Search</el-button>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>
        </div>
        <el-card class="box-card" style="width: fit-content">
            <el-table :data="housesList" size="default" stripe>
                <el-table-column prop="name" label="Date" sortable width="180" />
                <el-table-column prop="bedrooms" label="Bedrooms" sortable width="130" />
                <el-table-column prop="bathrooms" label="Bathrooms" sortable width="130" />
                <el-table-column prop="storeys" label="Storeys" sortable width="130" />
                <el-table-column prop="garages" label="Garages" sortable width="130" />
                <el-table-column prop="price" label="Price" sortable width="180" />
            </el-table>
        </el-card>
        </el-col>
        </el-main>
    </el-container>
</template>

<script>
import { ElButton, ElTable, ElForm, ElRow, ElCol, ElCard, ElMain, ElContainer,
    ElFormItem, ElTableColumn, ElInput} from 'element-plus'
import { Search } from '@element-plus/icons-vue';

export default {
    components: {
        ElButton,
        ElTable,
        Search,
        ElForm,
        ElRow,
        ElCol,
        ElCard,
        ElMain,
        ElContainer,
        ElFormItem,
        ElTableColumn,
        ElInput,
    },
    data() {
        return {
            filters: {
                nameQuery: null,
                bedroomsNumber: 4,
                bathroomsNumber: null,
                storeysNumber: null,
                garagesNumber: null,
                priceFrom: null,
                priceTo: null,
            },
            housesList: [],
        }
    },
    methods: {
        getData(params) {
            window.axios.get('/api/houses', {params: params}).then((res) => {
                this.housesList = res.data;
            })
        }
    },
    mounted() {
        this.getData(this.filters);
    },
}
</script>
