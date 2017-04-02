<?php declare(strict_types = 1);

namespace DaveRandom\CallbackValidator\Test;

use DaveRandom\CallbackValidator\Test\Fixtures\ClassImplementingInvoke;
use DaveRandom\CallbackValidator\Test\Fixtures\ClassImplementingNothing;
use DaveRandom\CallbackValidator\Test\Fixtures\ClassImplementingToString;
use DaveRandom\CallbackValidator\Test\Fixtures\ClassImplementingTraversable;
use DaveRandom\CallbackValidator\MatchTester;
use DaveRandom\CallbackValidator\BuiltInTypes;
use PHPUnit\Framework\TestCase;

class MatchTesterTest extends TestCase
{
    public function test_ClassImplementingTraversable_Match_Iterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingTraversable::class, false, false));
    }

    public function test_ClassImplementingTraversable_Match_Iterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingTraversable::class, false, true));
    }

    public function test_NullableClassImplementingTraversable_NotMatch_Iterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingTraversable::class, true, false));
    }

    public function test_NullableClassImplementingTraversable_NotMatch_Iterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingTraversable::class, true, true));
    }

    public function test_ClassImplementingTraversable_Match_NullableIterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingTraversable::class, false, false));
    }

    public function test_ClassImplementingTraversable_Match_NullableIterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingTraversable::class, false, true));
    }

    public function test_NullableClassImplementingTraversable_Match_NullableIterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingTraversable::class, true, false));
    }

    public function test_NullableClassImplementingTraversable_Match_NullableIterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingTraversable::class, true, true));
    }

    public function test_Array_Match_Iterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::ARRAY, false, false));
    }

    public function test_Array_Match_Iterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::ARRAY, false, true));
    }

    public function test_NullableArray_NotMatch_Iterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::ARRAY, true, false));
    }

    public function test_NullableArray_NotMatch_Iterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::ARRAY, true, true));
    }

    public function test_Array_Match_NullableIterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::ARRAY, false, false));
    }

    public function test_Array_Match_NullableIterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::ARRAY, false, true));
    }

    public function test_NullableArray_Match_NullableIterable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::ARRAY, true, false));
    }

    public function test_NullableArray_Match_NullableIterable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::ARRAY, true, true));
    }

    public function test_ClassNotImplementingTraversable_NotMatch_Iterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingTraversable_NotMatch_Iterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingTraversable_NotMatch_Iterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingTraversable_NotMatch_Iterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, ClassImplementingNothing::class, true, true));
    }

    public function test_ClassNotImplementingTraversable_NotMatch_NullableIterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingTraversable_NotMatch_NullableIterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingTraversable_NotMatch_NullableIterable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingTraversable_NotMatch_NullableIterable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, ClassImplementingNothing::class, true, true));
    }

    public function test_ClassImplementingToString_NotMatch_String_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingTraversable::class, false, false));
    }

    public function test_ClassImplementingToString_Match_String_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingToString::class, false, true));
    }

    public function test_NullableClassImplementingToString_NotMatch_String_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingToString::class, true, false));
    }

    public function test_NullableClassImplementingToString_NotMatch_String_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingToString::class, true, true));
    }

    public function test_ClassImplementingToString_NotMatch_NullableString_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingToString::class, false, false));
    }

    public function test_ClassImplementingToString_Match_NullableString_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingToString::class, false, true));
    }

    public function test_NullableClassImplementingToString_NotMatch_NullableString_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingToString::class, true, false));
    }

    public function test_NullableClassImplementingToString_Match_NullableString_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingToString::class, true, true));
    }

    public function test_ClassNotImplementingToString_NotMatch_String_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingToString_NotMatch_String_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingToString_NotMatch_String_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingToString_NotMatch_String_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, ClassImplementingNothing::class, true, true));
    }

    public function test_ClassNotImplementingToString_NotMatch_NullableString_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingToString_NotMatch_NullableString_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingToString_NotMatch_NullableString_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingToString_NotMatch_NullableString_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, ClassImplementingNothing::class, true, true));
    }

    public function test_ClassImplementingInvoke_NotMatch_Callable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingTraversable::class, false, false));
    }

    public function test_ClassImplementingInvoke_Match_Callable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingInvoke::class, false, true));
    }

    public function test_NullableClassImplementingInvoke_NotMatch_Callable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingInvoke::class, true, false));
    }

    public function test_NullableClassImplementingInvoke_NotMatch_Callable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingInvoke::class, true, true));
    }

    public function test_ClassImplementingInvoke_Match_NullableCallable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingInvoke::class, false, false));
    }

    public function test_ClassImplementingInvoke_Match_NullableCallable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingInvoke::class, false, true));
    }

    public function test_NullableClassImplementingInvoke_Match_NullableCallable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingInvoke::class, true, false));
    }

    public function test_NullableClassImplementingInvoke_Match_NullableCallable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingInvoke::class, true, true));
    }

    public function test_Closure_Match_Callable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, \Closure::class, false, false));
    }

    public function test_Closure_Match_Callable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, \Closure::class, false, true));
    }

    public function test_NullableClosure_NotMatch_Callable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, \Closure::class, true, false));
    }

    public function test_NullableClosure_NotMatch_Callable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, \Closure::class, true, true));
    }

    public function test_Closure_Match_NullableCallable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, \Closure::class, false, false));
    }

    public function test_Closure_Match_NullableCallable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, \Closure::class, false, true));
    }

    public function test_NullableClosure_Match_NullableCallable_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, \Closure::class, true, false));
    }

    public function test_NullableClosure_Match_NullableCallable_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, \Closure::class, true, true));
    }

    public function test_ClassNotImplementingInvokeOrClosure_NotMatch_Callable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingInvokeOrClosure_NotMatch_Callable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingInvokeOrClosure_NotMatch_Callable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingInvokeOrClosure_NotMatch_Callable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, ClassImplementingNothing::class, true, true));
    }

    public function test_ClassNotImplementingInvokeOrClosure_NotMatch_NullableCallable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingNothing::class, false, false));
    }

    public function test_ClassNotImplementingInvokeOrClosure_NotMatch_NullableCallable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingNothing::class, false, true));
    }

    public function test_NullableClassNotImplementingInvokeOrClosure_NotMatch_NullableCallable_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingNothing::class, true, false));
    }

    public function test_NullableClassNotImplementingInvokeOrClosure_NotMatch_NullableCallable_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, ClassImplementingNothing::class, true, true));
    }

    public function test_NotVoid_NotMatch_Void_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ARRAY, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ARRAY, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ARRAY, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ARRAY, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::CALLABLE, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::CALLABLE, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::CALLABLE, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::CALLABLE, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ITERABLE, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ITERABLE, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ITERABLE, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ITERABLE, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, ClassImplementingNothing::class, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, ClassImplementingNothing::class, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, ClassImplementingNothing::class, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, ClassImplementingNothing::class, true, false));
    }

    public function test_NotVoid_NotMatch_Void_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ARRAY, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ARRAY, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ARRAY, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ARRAY, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::CALLABLE, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::CALLABLE, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::CALLABLE, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::CALLABLE, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ITERABLE, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::ITERABLE, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ITERABLE, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::ITERABLE, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, ClassImplementingNothing::class, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, ClassImplementingNothing::class, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, ClassImplementingNothing::class, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, ClassImplementingNothing::class, true, true));
    }

    public function test_Void_Match_Void_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::VOID, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::VOID, true, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::VOID, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::VOID, true, false));
    }

    public function test_Void_Match_Void_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::VOID, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::VOID, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::VOID, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::VOID, true, true));
    }

    public function test_ScalarSubTypes_Match_ScalarSuperTypes_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::BOOL, false, true));
    }

    public function test_ScalarSubTypes_NotMatch_NonScalarBuiltInSuperTypes_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::BOOL, false, true));
    }

    public function test_ScalarSubTypes_Match_NullableScalarSuperTypes_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::BOOL, false, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::STRING, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::INT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::FLOAT, false, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::BOOL, false, true));
    }

    public function test_ScalarSubTypes_NotMatch_NullableNonScalarBuiltInSuperTypes_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::BOOL, false, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::STRING, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::INT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::FLOAT, false, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::BOOL, false, true));
    }

    public function test_NullableScalarSubTypes_NotMatch_ScalarSuperTypes_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::BOOL, true, true));
    }

    public function test_NullableScalarSubTypes_NotMatch_NonScalarBuiltInSuperTypes_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::BOOL, true, true));
    }

    public function test_NullableScalarSubTypes_Match_NullableScalarSuperTypes_WeakMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::STRING, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::INT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::FLOAT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::BOOL, true, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::STRING, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::INT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::FLOAT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::BOOL, true, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::STRING, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::INT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::FLOAT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::BOOL, true, true));

        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::STRING, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::INT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::FLOAT, true, true));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::BOOL, true, true));
    }

    public function test_NullableScalarSubTypes_NotMatch_NullableNonScalarBuiltInSuperTypes_WeakMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::BOOL, true, true));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::STRING, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::INT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::FLOAT, true, true));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::BOOL, true, true));
    }

    public function test_ScalarSubTypes_InvariantMatch_ScalarSuperTypes_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::STRING, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::INT, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::FLOAT, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::BOOL, false, false));
    }

    public function test_ScalarSubTypes_NotMatch_NonScalarBuiltInSuperTypes_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::BOOL, false, false));
    }

    public function test_ScalarSubTypes_InvariantMatch_NullableScalarSuperTypes_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::STRING, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::INT, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::FLOAT, false, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::BOOL, false, false));
    }

    public function test_ScalarSubTypes_NotMatch_NullableNonScalarBuiltInSuperTypes_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::BOOL, false, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::STRING, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::INT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::FLOAT, false, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::BOOL, false, false));
    }

    public function test_NullableScalarSubTypes_NotMatch_ScalarSuperTypes_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, false, BuiltInTypes::BOOL, true, false));
    }

    public function test_NullableScalarSubTypes_NotMatch_NonScalarBuiltInSuperTypes_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, false, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, false, BuiltInTypes::BOOL, true, false));
    }

    public function test_NullableScalarSubTypes_InvariantMatch_NullableScalarSuperTypes_StrictMode()
    {
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::STRING, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::STRING, true, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::INT, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::INT, true, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::FLOAT, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::FLOAT, true, false));
        $this->assertTrue(MatchTester::isMatch(BuiltInTypes::BOOL, true, BuiltInTypes::BOOL, true, false));
    }

    public function test_NullableScalarSubTypes_NotMatch_NullableNonScalarBuiltInSuperTypes_StrictMode()
    {
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ARRAY, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::VOID, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::CALLABLE, true, BuiltInTypes::BOOL, true, false));

        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::STRING, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::INT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::FLOAT, true, false));
        $this->assertFalse(MatchTester::isMatch(BuiltInTypes::ITERABLE, true, BuiltInTypes::BOOL, true, false));
    }
}
