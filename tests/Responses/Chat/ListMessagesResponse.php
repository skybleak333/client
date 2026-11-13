<?php

use OpenAI\Responses\Chat\ListMessagesResponse;
use OpenAI\Responses\Chat\ListMessagesResponseMessage;
use OpenAI\Responses\Meta\MetaInformation;

test('from', function () {
    $result = ListMessagesResponse::from(chatCompletionMessages(), meta());

    expect($result)
        ->object->toBe('list')
        ->data->toHaveCount(2)
        ->data->each->toBeInstanceOf(ListMessagesResponseMessage::class)
        ->firstId->toBe('chatcmpl-AyPNinnUqUDYo9SAdA52NobMflmj2-0')
        ->lastId->toBe('chatcmpl-AyPNinnUqUDYo9SAdA52NobMflmj2-1')
        ->hasMore->toBeFalse()
        ->meta()->toBeInstanceOf(MetaInformation::class);
});

test('as array accessible', function () {
    $result = ListMessagesResponse::from(chatCompletionMessages(), meta());

    expect($result['object'])->toBe('list');
});

test('to array', function () {
    $result = ListMessagesResponse::from(chatCompletionMessages(), meta());

    expect($result->toArray())
        ->toBe(chatCompletionMessages());
});

test('fake', function () {
    $response = ListMessagesResponse::fake();

    expect($response)
        ->object->toBe('list')
        ->data->{0}->role->toBe('user');
});

test('fake with override', function () {
    $response = ListMessagesResponse::fake([
        'has_more' => true,
    ]);

    expect($response)
        ->hasMore->toBeTrue();
});
