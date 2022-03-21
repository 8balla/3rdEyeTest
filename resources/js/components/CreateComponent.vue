<template>
    <div>
        <form :action="this.form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf" />
            <input type="hidden" name="obj_id" :value="this.obj_key" />
            <input type="hidden" name="obj" :value="this.obj_key" />
            <div class="row">
                <div class="row justify-content-left">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group right">
                            <strong class="text-white mb-2"> Name: </strong
                            ><br />
                            <select class="inp" v-model="name" name="name">
                                <option
                                    class="inp"
                                    v-for="items in item"
                                    :key="items.id"
                                    :value="items.name"
                                >
                                    {{ items.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group">
                            <strong class="text-white"> Class: </strong><br />
                            <select class="inp" v-model="clas" name="class">
                                <option
                                    v-for="items in item"
                                    :key="items.id"
                                    :value="items.class"
                                >
                                    {{ items.class }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group right">
                            <strong class="text-white">Crew:</strong>
                            <input
                                type="text"
                                class="inp form-control"
                                name="crew"
                                placeholder="crew"
                            />
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group">
                            <strong class="text-white">Value:</strong>
                            <input
                                type="text"
                                class="inp form-control"
                                name="value"
                                placeholder="value"
                            />
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group right">
                            <strong class="text-white">Status:</strong>
                            <select
                                class="inp form-control"
                                name="status"
                                placeholder="status"
                            >
                                <option class="text-black" value="Operational">
                                    Operational
                                </option>
                                <option value="Non-Operational">
                                    Non-Operational
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br />
                        <div class="form-group">
                            <strong class="text-white">Image:</strong><br />
                            <input
                                type="file"
                                name="image"
                                class="inp text-white"
                                placeholder="starship image"
                            />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right">
                        <br />
                        <div class="form-group right">
                            <br /><strong class="text-white">Armament:</strong>
                            <br />
                            <input
                                type="text"
                                class="inp form-control"
                                name="title"
                                placeholder="Title"
                            />

                            <input
                                type="text"
                                class="mt-4 inp form-control"
                                name="qty"
                                placeholder="Quantity"
                            />
                        </div>
                    </div>
                </div>

                <div
                    class="col-xs-12 col-sm-12 col-md-12 text-center mt-5 pt-5"
                >
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import item from "../../assets/Starship.json";
export default {
    props: ["form"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            item: item.data,
            name: "",
            clas: "",
            crew: "",
            value: "",
            status: "",
            armament: [{ title: "" }, { qty: "" }],
            obj_key: "",
        };
    },
    mounted() {
        console.log("Component mounted.", item);
        this.obj_key = Math.floor(Math.random() * (10 - 1 + 10)) + 1;
    },
};
</script>
<style scoped>
.right {
    float: right;
}
.left {
    float: left;
}
.inp {
    border-radius: 10px;
    border: thick rgba(251, 255, 0, 0.748) solid;
    width: 300px;
    height: 55px;
}

</style>
