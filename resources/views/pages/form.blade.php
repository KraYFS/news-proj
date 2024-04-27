@extends('layouts.app')


<div class="uk-flex-top uk-modal uk-flex uk-open" uk-modal="bg-close: false, " id="form_modal" tabindex="-1">
        <div class="uk-modal-dialog uk-margin-auto-vertical" role="dialog" aria-modal="true">
            <div class="modal__content">
                <div class="backgr__image">
                </div>
                <div class="form__wrapper">
                    <button class="uk-modal-close-outside" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_38_1867)">
                                <path d="M17.7646 6.23549C17.6601 6.13095 17.5361 6.04802 17.3996 5.99144C17.263 5.93485 17.1167 5.90573 16.9689 5.90573C16.8211 5.90573 16.6747 5.93485 16.5382 5.99144C16.4016 6.04802 16.2776 6.13095 16.1731 6.23549L12.0001 10.41L7.82712 6.23624C7.61607 6.02519 7.32983 5.90663 7.03137 5.90663C6.7329 5.90663 6.44666 6.02519 6.23562 6.23624C6.02457 6.44729 5.90601 6.73353 5.90601 7.03199C5.90601 7.33046 6.02457 7.6167 6.23562 7.82774L10.4101 12L6.23637 16.173C6.13187 16.2775 6.04897 16.4015 5.99242 16.5381C5.93586 16.6746 5.90676 16.821 5.90676 16.9687C5.90676 17.2672 6.02532 17.5534 6.23637 17.7645C6.44741 17.9755 6.73365 18.0941 7.03212 18.0941C7.33058 18.0941 7.61682 17.9755 7.82787 17.7645L12.0001 13.59L16.1731 17.7637C16.3842 17.9748 16.6704 18.0934 16.9689 18.0934C17.2673 18.0934 17.5536 17.9748 17.7646 17.7637C17.9757 17.5527 18.0942 17.2665 18.0942 16.968C18.0942 16.6695 17.9757 16.3833 17.7646 16.1722L13.5901 12L17.7639 7.82699C17.8684 7.72252 17.9513 7.59846 18.0079 7.46193C18.0645 7.32539 18.0936 7.17904 18.0936 7.03124C18.0936 6.88344 18.0645 6.73709 18.0079 6.60056C17.9513 6.46402 17.8684 6.33997 17.7639 6.23549H17.7646Z" fill="white"></path>
                                <path d="M4.5 0.75C4.00754 0.75 3.51991 0.846997 3.06494 1.03545C2.60997 1.22391 2.19657 1.50013 1.84835 1.84835C1.14509 2.55161 0.75 3.50544 0.75 4.5V19.5C0.75 20.4946 1.14509 21.4484 1.84835 22.1516C2.19657 22.4999 2.60997 22.7761 3.06494 22.9645C3.51991 23.153 4.00754 23.25 4.5 23.25H19.5C20.4946 23.25 21.4484 22.8549 22.1516 22.1516C22.8549 21.4484 23.25 20.4946 23.25 19.5V4.5C23.25 4.00754 23.153 3.51991 22.9645 3.06494C22.7761 2.60997 22.4999 2.19657 22.1516 1.84835C21.8034 1.50013 21.39 1.22391 20.9351 1.03545C20.4801 0.846997 19.9925 0.75 19.5 0.75H4.5ZM2.25 4.5C2.25 3.90326 2.48705 3.33097 2.90901 2.90901C3.33097 2.48705 3.90326 2.25 4.5 2.25H19.5C20.0967 2.25 20.669 2.48705 21.091 2.90901C21.5129 3.33097 21.75 3.90326 21.75 4.5V19.5C21.75 20.0967 21.5129 20.669 21.091 21.091C20.669 21.5129 20.0967 21.75 19.5 21.75H4.5C3.90326 21.75 3.33097 21.5129 2.90901 21.091C2.48705 20.669 2.25 20.0967 2.25 19.5V4.5Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_38_1867">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <div class="modal__header">
                        Анкета співробітника
                    </div>
                    <div class="form__subheader">
                        Залиште ваші дані і ми зв’яжемося з вами для їх підтвердження
                    </div>
                    <div class="person__cards">
                        <div class="card">
                            <div class="card__image">
                                <img src="http://127.0.0.1:8000/img/card1.png" width="111" height="105" alt="">
                            </div>
                            <div class="card__title">
                                Посвідчення репортера
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__image">
                                <img src="http://127.0.0.1:8000/img/card2.png" width="92" height="112" alt="">
                            </div>
                            <div class="card__title">
                                Перепустка на авто
                            </div>
                        </div>
                    </div>
                    <form action="http://127.0.0.1:8000/formJobs" class="user__form" id="user_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="fKhLi3sfXxzX3gaNoZhr1FA7lge5riyKSYzoExqF">                        <div class="form__block">
                            <div class="block__header">
                                Особисті дані
                            </div>
                            <div class="form__row row__3">
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Прізвище
                                    </div>
                                    <input type="text" class="input" name="last_name" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Ім’я
                                    </div>
                                    <input type="text" class="input" name="first_name" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        По-батькові
                                    </div>
                                    <input type="text" class="input" name="surname">
                                </div>
                            </div>
                            <div class="form__row row__3">
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Контактний телефон
                                    </div>
                                    <input type="tel" class="input" name="phone" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label required">
                                        E-Mail
                                    </div>
                                    <input type="email" class="input" name="email" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Маю автомобіль
                                    </div>
                                    <select class="custom__select" name="car" data-id="ss-el3nhm4v" tabindex="-1" aria-hidden="true" style="display: none;">
                                        <option value="1">Ні</option>
                                        <option value="2">Так</option>
                                    </select><div data-id="ss-el3nhm4v" id="ss-el3nhm4v" tabindex="0" class="ss-main custom__select" role="combobox" aria-haspopup="listbox" aria-controls="ss-el3nhm4v" aria-expanded="false" aria-activedescendant="1xma0lw9"><div class="ss-values"><div class="ss-single">Ні</div></div><div class="ss-deselect ss-hide"><svg viewBox="0 0 100 100"><path d="M10,10 L90,90 M10,90 L90,10"></path></svg></div><svg class="ss-arrow" viewBox="0 0 100 100"><path d="M10,30 L50,70 L90,30"></path></svg></div>
                                </div>
                            </div>
                        </div>
                        <div class="form__block show_selects">
                            <div class="form__row row__2">
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Марка та модель автомобіля
                                    </div>
                                    <input type="text" class="input" name="car_brand" placeholder="Ford Scorpio">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Державний номер автомобіля
                                    </div>
                                    <input type="text" class="input" name="car_number" placeholder="XX 0000 XX">
                                </div>
                            </div>
                        </div>
                        <div class="form__block">
                            <div class="block__header">
                                Посада
                            </div>
                            <div class="form__row row__2">
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Бажана посада
                                    </div>
                                    <select class="custom__select" name="speciality_id" data-id="ss-ufat98kd" tabindex="-1" aria-hidden="true" style="display: none;">
                                                                                <option value="1">Р РµРґР°РєС‚РѕСЂ</option>
                                                                                <option value="2">РЎРџР•Р¦Р†РђР›Р¬РќРР™ РљРћР Р•РЎРџРћРќР”Р•РќРў</option>
                                                                                <option value="3">Р Р•РџРћР РўР•Р  Р’Р†Р™РЎР¬РљРћР’РР™ РљРћР Р•РЎРџРћРќР”Р•РќРў</option>
                                                                            </select><div data-id="ss-ufat98kd" id="ss-ufat98kd" tabindex="0" class="ss-main custom__select" role="combobox" aria-haspopup="listbox" aria-controls="ss-ufat98kd" aria-expanded="false" aria-activedescendant="tq4uspo5"><div class="ss-values"><div class="ss-single">Р РµРґР°РєС‚РѕСЂ</div></div><div class="ss-deselect ss-hide"><svg viewBox="0 0 100 100"><path d="M10,10 L90,90 M10,90 L90,10"></path></svg></div><svg class="ss-arrow" viewBox="0 0 100 100"><path d="M10,30 L50,70 L90,30"></path></svg></div>
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Термін
                                    </div>
                                    <select class="custom__select" name="term" data-id="ss-pty7cjhu" tabindex="-1" aria-hidden="true" style="display: none;">

                                                                                <option value="1">1 рік</option>
                                                                                <option value="2">2 роки</option>
                                                                                <option value="3">3 роки</option>
                                                                                <option value="4">4 роки</option>
                                                                                <option value="5">5 років</option>
                                                                            </select><div data-id="ss-pty7cjhu" id="ss-pty7cjhu" tabindex="0" class="ss-main custom__select" role="combobox" aria-haspopup="listbox" aria-controls="ss-pty7cjhu" aria-expanded="false" aria-activedescendant="0m4q40ej"><div class="ss-values"><div class="ss-single">1 рік</div></div><div class="ss-deselect ss-hide"><svg viewBox="0 0 100 100"><path d="M10,10 L90,90 M10,90 L90,10"></path></svg></div><svg class="ss-arrow" viewBox="0 0 100 100"><path d="M10,30 L50,70 L90,30"></path></svg></div>
                                </div>
                            </div>
                        </div>
                        <div class="form__block">
                            <div class="block__header">
                                Місце проживання
                            </div>
                            <div class="form__row row__3">
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Область
                                    </div>
                                    <input type="text" class="input" name="region" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Місто
                                    </div>
                                    <input type="text" class="input" name="city" required="">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Вулиця
                                    </div>
                                    <input type="text" class="input" name="steer">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Будинок
                                    </div>
                                    <input type="text" class="input" name="house">
                                </div>
                                <div class="input__wrapper">
                                    <div class="label ">
                                        Квартира
                                    </div>
                                    <input type="text" class="input" name="apartment">
                                </div>
                            </div>
                        </div>
                        <div class="form__block">
                            <div class="block__header">
                                Адреса доставки
                            </div>
                            <div class="form__row row__2">
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Місто
                                    </div>
                                    <select class="custom__select" name="delivery_addresses_city" data-id="ss-y613borq" tabindex="-1" aria-hidden="true" style="display: none;">
                                                                                <option value="25">Р›СѓС†СЊРє</option>
                                                                                <option value="24">РЎС–РјС„РµСЂРѕРїРѕР»СЊ</option>
                                                                                <option value="23">Р›СѓРіР°РЅСЃСЊРє</option>
                                                                                <option value="22">Р”РѕРЅРµС†СЊРє</option>
                                                                                <option value="21">РҐРµСЂСЃРѕРЅ</option>
                                                                                <option value="20">РЎСѓРјРё</option>
                                                                                <option value="19">РЈР¶РіРѕСЂРѕРґ</option>
                                                                                <option value="18">Р§РµСЂРЅС–РіС–РІ</option>
                                                                                <option value="17">РњРёРєРѕР»Р°С—РІ</option>
                                                                                <option value="16">РљСЂРѕРїРёРІРЅРёС†СЊРєРёР№</option>
                                                                                <option value="15">Р§РµСЂРЅС–РІС†С–</option>
                                                                                <option value="14">Р–РёС‚РѕРјРёСЂ</option>
                                                                                <option value="13">Р§РµСЂРєР°СЃРё</option>
                                                                                <option value="12">РџРѕР»С‚Р°РІР°</option>
                                                                                <option value="11">РҐРјРµР»СЊРЅРёС†СЊРєРёР№</option>
                                                                                <option value="10">РћРґРµСЃР°</option>
                                                                                <option value="9">Р—Р°РїРѕСЂС–Р¶Р¶СЏ</option>
                                                                                <option value="8">Р С–РІРЅРµ</option>
                                                                                <option value="7">Р’С–РЅРЅРёС†СЏ</option>
                                                                                <option value="6">Р”РЅС–РїСЂРѕ</option>
                                                                                <option value="5">РҐР°СЂРєС–РІ</option>
                                                                                <option value="4">РўРµСЂРЅРѕРїС–Р»СЊ</option>
                                                                                <option value="3">Р†РІР°РЅРѕ-Р¤СЂР°РЅРєС–РІСЃСЊРє</option>
                                                                                <option value="2">Р›СЊРІС–РІ</option>
                                                                                <option value="1">РљРёС—РІ</option>
                                                                            </select><div data-id="ss-y613borq" id="ss-y613borq" tabindex="0" class="ss-main custom__select" role="combobox" aria-haspopup="listbox" aria-controls="ss-y613borq" aria-expanded="false" aria-activedescendant="awehb9x4"><div class="ss-values"><div class="ss-single">Р›СѓС†СЊРє</div></div><div class="ss-deselect ss-hide"><svg viewBox="0 0 100 100"><path d="M10,10 L90,90 M10,90 L90,10"></path></svg></div><svg class="ss-arrow" viewBox="0 0 100 100"><path d="M10,30 L50,70 L90,30"></path></svg></div>
                                </div>
                                <div class="input__wrapper">
                                    <div class="label required">
                                        Відділення нової пошти
                                    </div>
                                    <input type="text" class="input" name="delivery_addresses_department" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form__block">
                            <div class="block__header">
                                Фото на посвідчення
                            </div>
                            <div class="block__subheader">
                                Виберіть файл формату .jpg або .png. Розмір файлу не повинен перевищувати 5 Mb
                            </div>
                            <div uk-form-custom="" class="upload__image js-upload uk-form-custom" id="form__custom">
                                <input type="file" aria-label="Custom controls" name="photo" id="upload_input">
                                <span class="uk-link">
                                    <img src="http://127.0.0.1:8000/img/upload.svg" width="24" height="24" alt="">
                                    Обрати файл
                                </span>
                            </div>
                            <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden=""></progress>
                            <img id="editor_container" style="display: none" src="http://127.0.0.1:8000/img/avatar.jpg" width="1080" height="608">
                            <div class="btn__wrapper">
                                <button class="submit__btn save__image" style="display: none">
                                    Сохранить
                                </button>
                            </div>
                            <input type="hidden" id="input_image">
                            <div class="append_image_loadeds"></div>
                            <div class="append_error_field_file"></div>
                        </div>
                        <div class="form__block">
                            <div class="btn__wrapper">
                                <button type="submit" class="submit__btn">
                                    відправити
                                </button>
                            </div>
                            <div class="input__wrapper">
                                <label>
                                    <input class="uk-checkbox" type="checkbox" required="">
                                    Погоджуюсь на <a href="http://127.0.0.1:8000" target="_blank">обробку особистих даних</a>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>