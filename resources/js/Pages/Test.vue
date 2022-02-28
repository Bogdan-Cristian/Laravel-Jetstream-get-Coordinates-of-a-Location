<template>
    <div>
        <h2>why yes</h2>
        {{data}}
<!--        <button @click="newMethod('bad orb')">butonu</button>-->
        <Button>Button</Button>
        <SectionTitle>
            <template v-slot:title>
                This is the title
            </template>

            <template v-slot:description>
                This is the Section description
            </template>

            <Input :value="$value"></Input>
        </SectionTitle>
    </div>
</template>


<script>

import Button from '../Jetstream/Button';
import SectionTitle  from '../Jetstream/SectionTitle';
import Input from '../Jetstream/Input';

export default {
    components: {
        Button,
        SectionTitle,
        Input
    },
    data() {
        return {
            value: 'banan'
        }
    },
    props: ['data'],
    methods: {
        newMethod(query){
            var apiUrl = 'https://www.ebay-kleinanzeigen.de/s-ort-empfehlungen.json?query=';
            var address = apiUrl + query;
            // var respon = fetch("https://www.ebay-kleinanzeigen.de/s-ort-empfehlungen.json?query=bad+orb", {
            //     "headers": {
            //         "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            //         "accept-language": "de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7",
            //         "cache-control": "max-age=0",
            //         "sec-fetch-dest": "document",
            //         "sec-fetch-mode": "navigate",
            //         "sec-fetch-site": "none",
            //         "sec-fetch-user": "?1",
            //         "upgrade-insecure-requests": "1"
            //     },
            //     "referrerPolicy": "strict-origin-when-cross-origin",
            //     "body": null,
            //     "method": "GET",
            //     "mode": "cors",
            //     "credentials": "include"
            // });

            fetch("https://www.ebay-kleinanzeigen.de/s-ort-empfehlungen.json?query=bad", {
                "headers": {
                    "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                    "accept-language": "de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7",
                    "cache-control": "max-age=0",
                    "sec-fetch-dest": "document",
                    "sec-fetch-mode": "navigate",
                    "sec-fetch-site": "none",
                    "sec-fetch-user": "?1",
                    "upgrade-insecure-requests": "1",
                    "cookie": "GCLB=COiqz6GLgb7s_wE; up=%7B%22ln%22%3A%22916580034%22%2C%22lln%22%3A%22ad58567f-94c1-4628-b71d-ecd916cc98dd%22%2C%22llstv%22%3A%2297-js-errorlog%3DA%7Creact-msgbox-payship%3DA%7Creact-msgbox-userratings%3DB%7C78-messagebox-jsp-k8s%3DB%7CDesktop_Test%3DA%7C76-preact-header-footer%3DA%7C74-react-messagebox%3DA%22%2C%22ls%22%3A%22l%3D0%22%7D; _ga=GA1.2.1162354498.1606770139; _gid=GA1.2.846745245.1606770139; rbzid=dqd2Bud4z/euIClv3oNvfkappF+AUSVyJ0pqwxQJx8oQ2rTbenJc8WaYm1XGJ5LoVaP9KfFV2DUuDFJmR1zJa2o4xPCQ0ePXvkgTB16sulcwwLNobhL4DEDSYMdaiJRao4apIpWOQhUCtedv+5zTelUTJeZE6TP5elimtKGQOunCkXVO+XnMFfvC+10RzvRGQHig/4ynhWoNymruafMMIfuyzkcDD8R8Qe1eAKoR2KqtvplVyqcSBUyR1subE16vZPgX390yHmtRGEU6xAPia/zuDmiY3V0Ahvg9iM1JZ2BbB2b7/iDigzya1OyEK6WX; rbzsessionid=176c7eea6bb75bfdc2b6df27ae4a7b5a; ioam2018=001b201e95aca44b45fc55dda:1634331739160:1606770139160:.ebay-kleinanzeigen.de:2:ebaykanz:ebayK-1:noevent:1606770139160:dp627j; clientId=1162354498.1606770139; ekConsentTcf2={%22encodedConsentString%22:%22CO9tadjO9tadjE1ABADEBCCgAP_AAAAAAAYgHItf_X_fb3_j-_59__t0eY1f9_7_v20zjheds-8Nyd_X_L8X_2M7vB36pr4KuR4ku3bBIQdtHOncTUmx6IlVqTPsbk2Mr7NKJ7PEmnsbe2dYGH9_n9XT_ZKZ79_v___7________7_______3_v__9__-34AAACSkAGAAIHIkoAMAAQORIQAYAAgciOgAwABA5EZABgACByIqADAAEDkREAGAAIHIhoAMAAQORCQAYAAgciA.YAAAAAAAASA%22%2C%22customVersion%22:2%2C%22googleConsentGiven%22:true}; ekConsentBucketTcf2=full2-imp; iom_consent=0103ff03ff03ff&1606770140855; JSESSIONID=C742F67404B2DDD2892AF6878D69021B-mc4.koeb47-28_i01_1001"
                },
                "referrerPolicy": "strict-origin-when-cross-origin",
                "body": null,
                "method": "GET",
                "mode": "cors"
            });
            console.log(respon);
            // this.$inertia.get('https://www.ebay-kleinanzeigen.de/s-ort-empfehlungen.json',
            //     {
            //         query: query
            //     },
            //     {
            //         header:{
            //             'Access-Control-Allow-Origin': true
            //         }
            //     }
            // )
            console.log(address);
        }
    }
}
</script>
