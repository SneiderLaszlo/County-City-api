<?php

/*
 * apiDoc annotációk a megyék és városok route-jaihoz.
 * A fájl csak dokumentációt tartalmaz, a futtatásra nincs hatása.
 *
 * Generálás: apidoc -i docs/ -o public/apidoc
 *
 * FIGYELEM: a mezőnevek (name, county_id) feltételezések,
 * írd át őket a saját migrációid alapján.
 */

/* ============================== MEGYÉK ============================== */

/**
 * @api {get} /counties Megyék listázása
 * @apiName IndexCounties
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Visszaadja az összes megyét (CountyController@index).
 *
 * @apiSuccess {Object[]} counties        Megyék listája.
 * @apiSuccess {Number}   counties.id     A megye azonosítója.
 * @apiSuccess {String}   counties.name   A megye neve.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 200 OK
 *     [
 *       { "id": 1, "name": "Pest" },
 *       { "id": 2, "name": "Fejér" }
 *     ]
 */

/**
 * @api {get} /counties/create Új megye űrlapja
 * @apiName CreateCounty
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Megjeleníti az új megye létrehozására szolgáló űrlapot (CountyController@create).
 *
 * @apiSuccessExample {html} Sikeres válasz:
 *     HTTP/1.1 200 OK
 */

/**
 * @api {post} /counties Új megye mentése
 * @apiName StoreCounty
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Új megyét hoz létre (CountyController@store).
 *
 * @apiBody {String} name A megye neve.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /counties
 *
 * @apiError (422) ValidationError A megadott adatok érvénytelenek.
 * @apiErrorExample {json} Hibás válasz:
 *     HTTP/1.1 422 Unprocessable Entity
 *     { "message": "The name field is required.", "errors": { "name": ["The name field is required."] } }
 */

/**
 * @api {get} /counties/:county/edit Megye szerkesztő űrlapja
 * @apiName EditCounty
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Megjeleníti a megye szerkesztő űrlapját (CountyController@edit).
 *
 * @apiParam {Number} county A megye azonosítója.
 *
 * @apiError (404) NotFound A megye nem található.
 */

/**
 * @api {patch} /counties/:county Megye módosítása
 * @apiName UpdateCounty
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Módosítja a megadott megyét (CountyController@update).
 *
 * @apiParam {Number} county A megye azonosítója.
 * @apiBody  {String} name   A megye új neve.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /counties
 *
 * @apiError (404) NotFound        A megye nem található.
 * @apiError (422) ValidationError A megadott adatok érvénytelenek.
 */

/**
 * @api {delete} /counties/:county Megye törlése
 * @apiName DestroyCounty
 * @apiGroup Counties
 * @apiVersion 1.0.0
 * @apiDescription Törli a megadott megyét (CountyController@destroy).
 *
 * @apiParam {Number} county A megye azonosítója.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /counties
 *
 * @apiError (404) NotFound A megye nem található.
 */

/* ============================== VÁROSOK ============================== */

/**
 * @api {get} /cities Városok listázása
 * @apiName IndexCities
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Visszaadja az összes várost (CityController@index).
 *
 * @apiSuccess {Object[]} cities            Városok listája.
 * @apiSuccess {Number}   cities.id         A város azonosítója.
 * @apiSuccess {String}   cities.name       A város neve.
 * @apiSuccess {Number}   cities.county_id  A megye azonosítója, amelyhez a város tartozik.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 200 OK
 *     [
 *       { "id": 1, "name": "Budapest", "county_id": 1 },
 *       { "id": 2, "name": "Székesfehérvár", "county_id": 2 }
 *     ]
 */

/**
 * @api {get} /cities/create Új város űrlapja
 * @apiName CreateCity
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Megjeleníti az új város létrehozására szolgáló űrlapot (CityController@create).
 *
 * @apiSuccessExample {html} Sikeres válasz:
 *     HTTP/1.1 200 OK
 */

/**
 * @api {post} /cities Új város mentése
 * @apiName StoreCity
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Új várost hoz létre (CityController@store).
 *
 * @apiBody {String} name      A város neve.
 * @apiBody {Number} county_id A megye azonosítója.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /cities
 *
 * @apiError (422) ValidationError A megadott adatok érvénytelenek.
 */

/**
 * @api {get} /cities/:city/edit Város szerkesztő űrlapja
 * @apiName EditCity
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Megjeleníti a város szerkesztő űrlapját (CityController@edit).
 *
 * @apiParam {Number} city A város azonosítója.
 *
 * @apiError (404) NotFound A város nem található.
 */

/**
 * @api {patch} /cities/:city Város módosítása
 * @apiName UpdateCity
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Módosítja a megadott várost (CityController@update).
 *
 * @apiParam {Number} city      A város azonosítója.
 * @apiBody  {String} name      A város új neve.
 * @apiBody  {Number} county_id A megye új azonosítója.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /cities
 *
 * @apiError (404) NotFound        A város nem található.
 * @apiError (422) ValidationError A megadott adatok érvénytelenek.
 */

/**
 * @api {delete} /cities/:city Város törlése
 * @apiName DestroyCity
 * @apiGroup Cities
 * @apiVersion 1.0.0
 * @apiDescription Törli a megadott várost (CityController@destroy).
 *
 * @apiParam {Number} city A város azonosítója.
 *
 * @apiSuccessExample {json} Sikeres válasz:
 *     HTTP/1.1 302 Found
 *     Location: /cities
 *
 * @apiError (404) NotFound A város nem található.
 */
