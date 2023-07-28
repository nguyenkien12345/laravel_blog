<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OneSignalAppValidation;
use App\Http\Requests\AddDeviceValidation;
use App\Http\Requests\SendNotificationValidation;
use Ladumor\OneSignal\OneSignal;
use App\Models\DeviceOneSignal;

class OneSignalController extends Controller
{
    // DONE
    public function getAllNotification()
    {
        $data = OneSignal::getNotifications();
        if ($data) {
            return $this->sentSuccessResponse($data, 'Get All Notification Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse(null, 'Get All Notification Fail', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // DONE
    public function getAllDevice()
    {
        $data = OneSignal::getDevices();
        if ($data) {
            return $this->sentSuccessResponse($data, 'Get All Device Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse(null, 'Get All Device Fail', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // DONE
    public function getAllApp()
    {
        $data = OneSignal::getApps();
        if ($data) {
            return $this->sentSuccessResponse($data, 'Get All App Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse(null, 'Get All App Fail', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // DONE
    public function getSingleNotification($notificationId)
    {
        $data = OneSignal::getNotification($notificationId);
        if ($data && empty($data['errors'])) {
            return $this->sentSuccessResponse($data, 'Get Detail Notification Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse($data['errors'], 'Get Detail Notification Fail', Response::HTTP_BAD_REQUEST);
        }
    }

    // DONE
    public function getSingleDevice($deviceId)
    {
        $data = OneSignal::getDevice($deviceId);
        if ($data && empty($data['errors'])) {
            return $this->sentSuccessResponse($data, 'Get Detail Device Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse($data['errors'], 'Get Detail Device Fail', Response::HTTP_BAD_REQUEST);
        }
    }

    // DONE
    public function getSingleApp($appId)
    {
        // 4196ad56-ab17-4894-be42-048d33c0fa66 => appId của App FEC
        $data = OneSignal::getApp($appId);
        if ($data && empty($data['errors'])) {
            return $this->sentSuccessResponse($data, 'Get Detail App Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse($data['errors'], 'Get Detail App Fail', Response::HTTP_BAD_REQUEST);
        }
    }

    // DONE
    public function createApp(OneSignalAppValidation $request)
    {
        $name = $request->name;

        $fields = [
            'name' => $name,
        ];

        $data = OneSignal::createApp($fields);
        if ($data  && empty($data['errors'])) {
            return $this->sentSuccessResponse($data, 'Create App ' . $name . ' Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse($data['errors'], 'Create App ' . $name . ' Fail', Response::HTTP_BAD_REQUEST);
        }
    }

    // DONE
    public function deleteDevice($deviceId)
    {
        $device = OneSignal::getDevice($deviceId);
        if ($device && !empty($device['errors'])) {
            return $this->sentFailResponse($device['errors'], 'Can Not Find Device', Response::HTTP_BAD_REQUEST);
        } else {
            $data = OneSignal::deleteDevice($deviceId);
            if ($data["success"]) {
                return $this->sentSuccessResponse(null, 'Get Detail App Success', Response::HTTP_NO_CONTENT);
            } else {
                return $this->sentFailResponse(null, 'Get Detail App Fail', Response::HTTP_BAD_REQUEST);
            }
        }
    }

    // DONE
    public function sendNotification(SendNotificationValidation $request)
    {
        $message = $request->message;
        $player_ids = $request->player_ids;
        $fields['include_player_ids'] = [
            $player_ids
        ];
        $data = OneSignal::sendPush($fields, $message);
        if ($data && empty($data['errors'])) {
            return $this->sentSuccessResponse($data, 'Send Notification Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse(null, 'Send Notification Fail', Response::HTTP_BAD_REQUEST);
        }
    }

    // DONE
    public function cancelNotification($notificationId)
    {
        $notification = OneSignal::getNotification($notificationId);
        if ($notification && !empty($notification['errors'])) {
            return $this->sentFailResponse($notification['errors'], 'Can Not Find Notification', Response::HTTP_BAD_REQUEST);
        } else {
            $data = OneSignal::cancelNotification($notificationId);
            if ($data && !empty($data['errors'])) {
                return $this->sentFailResponse($data['errors'], 'Cancel Send Notification Fail', Response::HTTP_BAD_REQUEST);
            } else {
                return $this->sentSuccessResponse($data, 'Cancel Send Notification Success', Response::HTTP_OK);
            }
        }
    }

    public function addDevice(AddDeviceValidation $request)
    {
        $device_type = $request->device_type;
        $language = $request->language;
        $device_model = $request->device_model;
        $device_os = $request->device_os;
        $user_id = $request->user_id;

        $fields = [
            'device_type' => $device_type,
            'language' => $language,
            'device_model' => $device_model,
            'device_os' => $device_os,
            'user_id' => $user_id,
        ];

        $data = DeviceOneSignal::create($fields);
        if ($data) {
            return $this->sentSuccessResponse($data, 'Send Notification Success', Response::HTTP_OK);
        } else {
            return $this->sentFailResponse(null, 'Send Notification Fail', Response::HTTP_BAD_REQUEST);
        }
    }
}
