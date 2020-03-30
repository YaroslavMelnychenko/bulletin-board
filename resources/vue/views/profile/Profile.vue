<template>
    <div class="profile page-default">
        <div class="page-default__content">
            <navbar class="navbar--wrapper-full"></navbar>
            <div class="profile__content">
                <div class="profile__tab">
                    <h2 class="profile__tab-title">Редактировать профиль</h2>
                    <profile-edit></profile-edit>
                </div>
                <div class="profile__tab">
                    <h2 class="profile__tab-title">Добавить объявление</h2>
                    <add-adv></add-adv>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Navbar from '../../components/navbar/Navbar';
import ProfileEdit from '../../components/profile-edit/ProfileEdit';
import AddAdv from '../../components/add-adv/AddAdv';

export default {
    name: 'profile',
    components: {
        Navbar,
        ProfileEdit,
        AddAdv
    }
}
</script>