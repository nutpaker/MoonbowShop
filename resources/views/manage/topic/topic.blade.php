@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="{{ route('profile.index')}}" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">Topics by you</h4>
<p class="subtitle is-size-7">Manage your forum information</p>
    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <div class="field">
                    <div id="app">
                        <template>
                            <section>
                                <b-tabs type="is-boxed" v-model="activeTab" expanded>
                                    <b-tab-item label="โพสต์ทั้งหมด" icon="login-variant">
                                        <table class="table is-fullwidth is-narrow">
                                            <thead>
                                                <tr>
                                                    <th>Topic</th>
                                                    <th>Views</th>
                                                    <th>Comments</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($topics as $topic)
                                                    <tr>
                                                        <th class="has-text-weight-medium">{{ $topic->topic_title }} @if( $topic->role_id == "1") <span class="tag is-danger" style="font-size: 8px;">Administrator</span> @elseif( $topic->role_id == "2") <span class="tag is-primary" style="font-size: 8px;">Player</span>   @endif</th>
                                                        <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                                        <th class="has-text-weight-medium">{{count($topic->comment)}}</th>
                                                        <th>
                                                            <div class="buttons">
                                                                <a href="{{ route('topic.show', [$topic->topic_id])}}" style="margin-right: 8px;" class="button is-black is-small">Go to topic</a>

                                                                <form method="POST" action="{{route('topicmanager.destroy', [$topic->topic_id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="button is-danger is-small">Move to Bin</button>
                                                                </form>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="has-text-centered" colspan="4">
                                                        ไม่มีเรื่องใดๆ ให้ดูเลย ลอง <a href="{{ route('topic.create') }}">เขียนเรื่องใหม่ </a>ดูสิ
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </b-tab-item>
                                    <b-tab-item label="โพสต์ที่ถูกลบ" icon="login-variant">
                                        <table class="table is-fullwidth is-narrow">
                                            <thead>
                                                <tr>
                                                    <th>Topic</th>
                                                    <th>Views</th>
                                                    <th>Comments</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($topics as $topic)
                                                    <tr>
                                                        <th class="has-text-weight-medium">{{ $topic->topic_title }} @if( $topic->role_id == "1") <span class="tag is-danger" style="font-size: 8px;">Administrator</span> @elseif( $topic->role_id == "2") <span class="tag is-primary" style="font-size: 8px;">Player</span>   @endif</th>
                                                        <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                                        <th class="has-text-weight-medium">{{count($topic->comment)}}</th>
                                                        <th>
                                                            <div class="buttons">
                                                                <a href="{{ route('topic.show', [$topic->topic_id])}}" style="margin-right: 8px;" class="button is-black is-small">Go to topic</a>

                                                                <form method="POST" action="{{route('topicmanager.destroy', [$topic->topic_id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="button is-danger is-small">Move to Bin</button>
                                                                </form>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="has-text-centered" colspan="4">
                                                        ไม่มีเรื่องใดๆ ให้ดูเลย ลอง <a href="{{ route('topic.create') }}">เขียนเรื่องใหม่ </a>ดูสิ
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </b-tab-item>
                                    <b-tab-item label="คอมเม้นท์" icon="login-variant">
                                        <h4 class="title is-size-4 has-text-weight-bold">เข้าสู่ระบบ</h4>
                                        <p class="subtitle is-size-7">มีบัญชีแล้วใช่ไหม เข้าใช้งานเลย</p>
                                    </b-tab-item>
                                </b-tabs>
                            </section>
                        </template>
                    </div>
                    <script src="https://unpkg.com/vue"></script>
                    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

                    <script>

                        new Vue({
                            el: '#app',

                            data: {
                                isRemember: "จำฉันไว้เข้าใช้ครั้งหน้าแล้ว",
                                email: null,
                                resetemail: null,
                                activeTab: 0,
                            },
                        })

                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
