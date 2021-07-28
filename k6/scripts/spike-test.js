import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '10s', target: 500 },
        { duration: '10s', target: 0 },
    ],
};
export default function () {
    const BASE_URL = 'http://localhost:8000';

    let responses = http.batch([
        [
            'GET',
            `${BASE_URL}/api/flux-total-nat/61004528a73366608166caa2`,
            null,
            {
                _id: "61004528a73366608166caa2",
                nb_UCD: "72847",
                nb_doses: "364235",
                type_de_vaccin: "Pfizer",
                date: "22/01/2021"
            },
        ],
        [
            'GET',
            `${BASE_URL}/api/allocations-vs-rdv/61004504a73366608166bbd1`,
            null,
            {
                _id: "61004504a73366608166bbd1",
                id_centre: "1000",
                date_debut_semaine: "2021-04-12",
                code_region: "75",
                nom_region: "NAQ",
                code_departement: "33",
                nom_departement: "Gironde",
                commune_insee: "33167",
                nom_centre: "NOUVELLE CLINIQUE DU TONDU",
                nombre_ucd: "6",
                doses_allouees: "36",
                rdv_pris: "64"
            },
        ],
    ]);

    sleep(1);
}
