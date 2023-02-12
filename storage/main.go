package main

import (
	"github.com/gofiber/fiber/v2"
)

type Model struct {
	Name          string `json:"name"`
	StudentNumber string `json:"student_number"`
}

func main() {
	app := fiber.New()

	app.Get("/store", func(ctx *fiber.Ctx) error {

	})

	app.Put("/store", func(ctx *fiber.Ctx) error {

	})

	if er := app.Listen(":10020"); er != nil {
		panic(er)
	}
}
