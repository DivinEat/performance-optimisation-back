import http from 'k6/http';
import encoding from 'k6/encoding';
import { check, sleep } from 'k6';

export let options = {
    vus: 1,
    duration: '10s',

    thresholds: {
        http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
    },
};

const BASE_URL = 'http://localhost:8000';
const USERNAME = 'administrateur';
const PASSWORD = 'SuperCoco345';

export default () => {
    // const credentials = `${USERNAME}:${PASSWORD}`;
    //
    // const encodedCredentials = encoding.b64encode(credentials);
    // const options = {
    //     headers: {
    //         Authorization: `Basic ${encodedCredentials}`,
    //     },
    // };
    //
    // let loginRes = http.get(
    //     `${BASE_URL}/auth`,
    //     options,
    // );
    //
    // check(loginRes, {
    //     'status is 200': (r) => r.status === 200,
    // });
    //
    // let authHeaders = {
    //     headers: {
    //         Authorization: `Bearer ${loginRes.body}`,
    //     },
    // };

    // let myObjects = http.get(`${BASE_URL}/api/stocks-plateformes`, authHeaders).json();
    let myObjects = http.get(`${BASE_URL}/api/flux-total-nat`).json();
    check(myObjects, { "fluxTotalNat" : (obj) => {
        return obj.fluxTotalNat.length !== 0;
    }});

    sleep(1);
};
