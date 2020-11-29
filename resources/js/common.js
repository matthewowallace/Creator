export default{
    data() {
        return {

        }
    },

    methods: {
        callApi(method, url, dataObj){
            try{
              return axios({
                    method: method,
                    url: url,
                    data: dataObj
               });
            }catch(e){
                return e.response
            }
        },

        info (desc, title="Hmmm Something is off") {
            this.$Notice.info({
                title: title,
                desc: desc
            });
        },
        success (desc, title="Success") {
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        warning (desc, title="Warning") {
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        error (desc, title="Error") {
            this.$Notice.error({
                title: title,
                desc: desc,
                duration: 5
            });
        },
        swr (desc, title="Hmmm Something is off") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        email (desc, title="Email already taken") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        }
    },
}
